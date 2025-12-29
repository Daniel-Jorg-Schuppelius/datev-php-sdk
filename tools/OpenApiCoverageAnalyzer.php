#!/usr/bin/env php
<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiCoverageAnalyzer.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 * 
 * This tool analyzes OpenAPI specifications and compares them with 
 * implemented endpoints to identify missing implementations.
 */

declare(strict_types=1);

namespace Datev\Tools;

class OpenApiCoverageAnalyzer {
    private string $docsPath;
    private string $endpointsPath;
    private string $apiType;
    private array $openApiSpecs = [];
    private array $implementedEndpoints = [];
    private array $results = [];

    // Mapping von OpenAPI-Dateinamen zu Domain-Verzeichnissen
    private array $domainMapping = [
        'Accounting' => 'Accounting',
        'Client Master Data' => 'ClientMasterData',
        'Diagnostics and Functional Tests' => 'Diagnostics',
        'document management' => 'DocumentManagement',
        'Identity and Access Management' => 'IdentityAndAccessManagement',
        'Law' => 'Law',
        'Order Management' => 'OrderManagement',
        'Payroll' => 'Payroll',
        'Public Sector' => 'PublicSector',
    ];

    // HTTP-Methoden die wir tracken
    private array $httpMethods = ['get', 'post', 'put', 'patch', 'delete'];

    public function __construct(?string $basePath = null, string $apiType = 'Desktop') {
        $basePath = $basePath ?? dirname(__DIR__);
        $this->apiType = $apiType;
        $this->docsPath = $basePath . '/docs/OpenAPI/' . $apiType;
        $this->endpointsPath = $basePath . '/src/API/' . $apiType . '/Endpoints';
    }

    public function getApiType(): string {
        return $this->apiType;
    }

    public static function getAvailableApiTypes(?string $basePath = null): array {
        $basePath = $basePath ?? dirname(__DIR__);
        $docsPath = $basePath . '/docs/OpenAPI';

        if (!is_dir($docsPath)) {
            return [];
        }

        $types = [];
        foreach (scandir($docsPath) as $item) {
            if ($item !== '.' && $item !== '..' && is_dir($docsPath . '/' . $item)) {
                $types[] = $item;
            }
        }
        return $types;
    }

    public function analyze(): array {
        $this->loadOpenApiSpecs();
        $this->scanImplementedEndpoints();
        $this->compareImplementations();
        return $this->results;
    }

    private function loadOpenApiSpecs(): void {
        $jsonFiles = glob($this->docsPath . '/*.json');

        foreach ($jsonFiles as $file) {
            $filename = basename($file);
            $content = file_get_contents($file);
            $spec = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Warning: Could not parse {$filename}\n";
                continue;
            }

            $domain = $this->extractDomainFromFilename($filename);
            if ($domain === null) {
                continue;
            }

            $this->openApiSpecs[$domain] = [
                'file' => $filename,
                'title' => $spec['info']['title'] ?? $domain,
                'version' => $spec['info']['version'] ?? 'unknown',
                'basePath' => $spec['basePath'] ?? '',
                'paths' => $this->extractPaths($spec),
            ];
        }
    }

    private function extractDomainFromFilename(string $filename): ?string {
        foreach ($this->domainMapping as $pattern => $domain) {
            if (stripos($filename, $pattern) !== false) {
                return $domain;
            }
        }
        return null;
    }

    private function extractPaths(array $spec): array {
        $paths = [];

        if (!isset($spec['paths'])) {
            return $paths;
        }

        foreach ($spec['paths'] as $path => $methods) {
            foreach ($this->httpMethods as $method) {
                if (isset($methods[$method])) {
                    $operation = $methods[$method];
                    $paths[] = [
                        'path' => $path,
                        'method' => strtoupper($method),
                        'operationId' => $operation['operationId'] ?? null,
                        'summary' => $operation['summary'] ?? '',
                        'tags' => $operation['tags'] ?? [],
                        'parameters' => $this->extractParameters($operation, $methods),
                    ];
                }
            }
        }

        return $paths;
    }

    private function extractParameters(array $operation, array $pathDef): array {
        $params = [];

        // Path-level parameters
        if (isset($pathDef['parameters'])) {
            foreach ($pathDef['parameters'] as $param) {
                if (isset($param['$ref'])) {
                    continue; // Skip refs for now
                }
                $params[] = [
                    'name' => $param['name'] ?? '',
                    'in' => $param['in'] ?? '',
                    'required' => $param['required'] ?? false,
                ];
            }
        }

        // Operation-level parameters
        if (isset($operation['parameters'])) {
            foreach ($operation['parameters'] as $param) {
                if (isset($param['$ref'])) {
                    continue;
                }
                $params[] = [
                    'name' => $param['name'] ?? '',
                    'in' => $param['in'] ?? '',
                    'required' => $param['required'] ?? false,
                ];
            }
        }

        return $params;
    }

    private function scanImplementedEndpoints(): void {
        $domainDirs = glob($this->endpointsPath . '/*', GLOB_ONLYDIR);

        foreach ($domainDirs as $domainDir) {
            $domain = basename($domainDir);
            $this->implementedEndpoints[$domain] = [];

            $endpointFiles = glob($domainDir . '/*Endpoint.php');

            foreach ($endpointFiles as $file) {
                $content = file_get_contents($file);
                $endpointInfo = $this->analyzeEndpointFile($content, basename($file));
                $this->implementedEndpoints[$domain][] = $endpointInfo;
            }
        }
    }

    private function analyzeEndpointFile(string $content, string $filename): array {
        $info = [
            'file' => $filename,
            'class' => str_replace('.php', '', $filename),
            'endpointPrefix' => '',
            'endpoint' => '',
            'endpointSuffix' => '',
            'methods' => [],
            'subResources' => [],
        ];

        // Extract endpointPrefix
        if (preg_match('/protected\s+string\s+\$endpointPrefix\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $matches)) {
            $info['endpointPrefix'] = $matches[1];
        }

        // Extract endpoint
        if (preg_match('/protected\s+string\s+\$endpoint\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $matches)) {
            $info['endpoint'] = $matches[1];
        }

        // Extract endpointSuffix (for Payroll endpoints)
        if (preg_match('/protected\s+string\s+\$endpointSuffix\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $matches)) {
            $info['endpointSuffix'] = $matches[1];
        }

        // Extract public methods
        preg_match_all('/public\s+function\s+(\w+)\s*\(/', $content, $matches);
        $info['methods'] = $matches[1] ?? [];

        // Extract sub-resources from method implementations
        // Look for patterns like: /resource-name" or /resource-name/
        preg_match_all('/\$this->getEndpointUrl\(\)\s*\.\s*[\'"]\/[^\/]+\/[^\'"\$]+\/([a-z\-]+)[\'"]/', $content, $subMatches);
        if (!empty($subMatches[1])) {
            $info['subResources'] = array_merge($info['subResources'], $subMatches[1]);
        }

        // Also look for patterns in string concatenation like: "/{$id}/budget"
        preg_match_all('/[\'"]\/\{\$[^}]+\}\/([a-z\-]+)[\'"]/', $content, $subMatches2);
        if (!empty($subMatches2[1])) {
            $info['subResources'] = array_merge($info['subResources'], $subMatches2[1]);
        }

        // Look for getContents with sub-resource paths
        preg_match_all('/getContents\([^)]*,\s*[^)]*,\s*[\'"][^"\']*\/([a-z\-]+)[\'"]/', $content, $subMatches3);
        if (!empty($subMatches3[1])) {
            $info['subResources'] = array_merge($info['subResources'], $subMatches3[1]);
        }

        // Extract sub-resources from method names (e.g., getBudget -> budget, getParties -> parties)
        foreach ($info['methods'] as $method) {
            if (preg_match('/^(get|create|update|delete)([A-Z][a-zA-Z]+)$/', $method, $methodMatch)) {
                $subResource = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $methodMatch[2]));
                // Only add if it looks like a sub-resource (not standard methods)
                if (!in_array($subResource, ['by-id', 'contents', 'all', 'one', 'many'])) {
                    $info['subResources'][] = $subResource;
                }
            }
        }

        $info['subResources'] = array_unique($info['subResources']);

        // Detect HTTP methods used
        $info['httpMethods'] = [];
        if (preg_match('/parent::getContents|->getContents/', $content)) {
            $info['httpMethods'][] = 'GET';
        }
        if (preg_match('/parent::postContent|->postContent|->post\(/', $content)) {
            $info['httpMethods'][] = 'POST';
        }
        if (preg_match('/parent::putContent|->putContent|->put\(/', $content)) {
            $info['httpMethods'][] = 'PUT';
        }
        if (preg_match('/parent::patchContent|->patchContent|->patch\(/', $content)) {
            $info['httpMethods'][] = 'PATCH';
        }
        if (preg_match('/parent::deleteContent|->deleteContent|->delete\(/', $content)) {
            $info['httpMethods'][] = 'DELETE';
        }

        return $info;
    }

    private function compareImplementations(): void {
        foreach ($this->openApiSpecs as $domain => $spec) {
            $implemented = $this->implementedEndpoints[$domain] ?? [];

            $this->results[$domain] = [
                'title' => $spec['title'],
                'version' => $spec['version'],
                'file' => $spec['file'],
                'totalPaths' => count($spec['paths']),
                'implementedEndpoints' => count($implemented),
                'coverage' => $this->calculateCoverage($spec['paths'], $implemented),
                'missingPaths' => $this->findMissingPaths($spec['paths'], $implemented),
                'implementedDetails' => $implemented,
            ];
        }
    }

    private function calculateCoverage(array $paths, array $endpoints): array {
        $pathsByResource = $this->groupPathsByResource($paths);
        $implementedResources = [];

        foreach ($endpoints as $endpoint) {
            $ep = strtolower($endpoint['endpoint']);
            if ($ep) {
                $implementedResources[] = $ep;
            }
            // Also extract from class name
            $className = strtolower(str_replace('Endpoint', '', $endpoint['class']));
            $implementedResources[] = $className;

            // Add endpointSuffix (for Payroll endpoints)
            if (!empty($endpoint['endpointSuffix'])) {
                $implementedResources[] = strtolower($endpoint['endpointSuffix']);
            }

            // Add sub-resources extracted from methods
            if (!empty($endpoint['subResources'])) {
                foreach ($endpoint['subResources'] as $subResource) {
                    $implementedResources[] = strtolower($subResource);
                }
            }
        }
        $implementedResources = array_unique($implementedResources);

        $covered = 0;
        $total = count($pathsByResource);

        foreach (array_keys($pathsByResource) as $resource) {
            $resourceLower = strtolower(str_replace('-', '', $resource));
            $resourceNormalized = str_replace(['_', '-'], '', $resourceLower);

            foreach ($implementedResources as $impl) {
                $implNormalized = str_replace(['_', '-'], '', $impl);
                if ($impl && (
                    str_contains($resourceNormalized, $implNormalized) ||
                    str_contains($implNormalized, $resourceNormalized) ||
                    $this->resourceMatches($resource, $impl)
                )) {
                    $covered++;
                    break;
                }
            }
        }

        return [
            'resources' => [
                'covered' => $covered,
                'total' => $total,
                'percentage' => $total > 0 ? round(($covered / $total) * 100, 1) : 0,
            ],
            'operations' => [
                'total' => count($paths),
            ],
        ];
    }

    private function resourceMatches(string $resource, string $impl): bool {
        // Normalize both strings
        $r = strtolower(str_replace(['-', '_'], '', $resource));
        $i = strtolower(str_replace(['-', '_'], '', $impl));

        // Check for common variations
        $singularR = rtrim($r, 's');
        $singularI = rtrim($i, 's');

        return $singularR === $singularI ||
            str_contains($r, $i) ||
            str_contains($i, $r);
    }

    private function groupPathsByResource(array $paths): array {
        $grouped = [];
        foreach ($paths as $pathInfo) {
            $path = $pathInfo['path'];
            // Extract primary resource from path
            $parts = explode('/', trim($path, '/'));
            $resource = '';
            foreach ($parts as $part) {
                if (!str_starts_with($part, '{') && !empty($part)) {
                    $resource = $part;
                }
            }
            if (!isset($grouped[$resource])) {
                $grouped[$resource] = [];
            }
            $grouped[$resource][] = $pathInfo;
        }
        return $grouped;
    }

    private function findMissingPaths(array $paths, array $endpoints): array {
        $missing = [];
        $implementedPatterns = [];

        foreach ($endpoints as $endpoint) {
            $ep = $endpoint['endpoint'];
            if ($ep) {
                $implementedPatterns[] = strtolower(str_replace(['-', '_'], '', $ep));
            }
            // Also add class name pattern
            $className = strtolower(str_replace(['Endpoint', '-', '_'], '', $endpoint['class']));
            $implementedPatterns[] = $className;

            // Add endpointSuffix (for Payroll endpoints)
            if (!empty($endpoint['endpointSuffix'])) {
                $implementedPatterns[] = strtolower(str_replace(['-', '_'], '', $endpoint['endpointSuffix']));
            }

            // Add sub-resources
            if (!empty($endpoint['subResources'])) {
                foreach ($endpoint['subResources'] as $subResource) {
                    $implementedPatterns[] = strtolower(str_replace(['-', '_'], '', $subResource));
                }
            }
        }
        $implementedPatterns = array_unique($implementedPatterns);

        foreach ($paths as $pathInfo) {
            $path = strtolower($pathInfo['path']);
            $pathNormalized = str_replace(['-', '_'], '', $path);
            $method = $pathInfo['method'];
            $isCovered = false;

            foreach ($implementedPatterns as $pattern) {
                if ($pattern && str_contains($pathNormalized, $pattern)) {
                    $isCovered = true;
                    break;
                }
            }

            // Check for special cases like /echo, /me, /batch
            if (str_contains($path, 'echo') || str_contains($path, '/me') || str_contains($path, '/batch')) {
                $isCovered = true;
            }

            if (!$isCovered) {
                $missing[] = [
                    'path' => $pathInfo['path'],
                    'method' => $method,
                    'summary' => $pathInfo['summary'],
                    'tags' => $pathInfo['tags'],
                ];
            }
        }

        return $missing;
    }

    public function printReport(): void {
        echo "\n";
        echo "╔══════════════════════════════════════════════════════════════════════════════╗\n";
        echo "║               DATEV PHP SDK - OpenAPI Coverage Analysis                      ║\n";
        echo "║                              API Type: " . str_pad($this->apiType, 37) . "║\n";
        echo "╚══════════════════════════════════════════════════════════════════════════════╝\n\n";

        $totalPaths = 0;
        $totalImplemented = 0;

        foreach ($this->results as $domain => $result) {
            $totalPaths += $result['totalPaths'];
            $totalImplemented += $result['implementedEndpoints'];

            $this->printDomainReport($domain, $result);
        }

        echo "\n";
        echo "═══════════════════════════════════════════════════════════════════════════════\n";
        echo "                              OVERALL SUMMARY                                  \n";
        echo "═══════════════════════════════════════════════════════════════════════════════\n";
        echo "Total API Operations:     {$totalPaths}\n";
        echo "Total Endpoint Classes:   {$totalImplemented}\n";
        echo "═══════════════════════════════════════════════════════════════════════════════\n\n";
    }

    private function printDomainReport(string $domain, array $result): void {
        $coverage = $result['coverage']['resources'];
        $statusIcon = $coverage['percentage'] >= 80 ? '✅' : ($coverage['percentage'] >= 50 ? '⚠️' : '❌');

        echo "┌──────────────────────────────────────────────────────────────────────────────┐\n";
        echo "│ {$statusIcon} {$domain}\n";
        echo "├──────────────────────────────────────────────────────────────────────────────┤\n";
        echo "│ OpenAPI File:    {$result['file']}\n";
        echo "│ API Version:     {$result['version']}\n";
        echo "│ Total Operations: {$result['totalPaths']}\n";
        echo "│ Endpoint Classes: {$result['implementedEndpoints']}\n";
        echo "│ Resource Coverage: {$coverage['covered']}/{$coverage['total']} ({$coverage['percentage']}%)\n";

        if (!empty($result['missingPaths'])) {
            echo "├──────────────────────────────────────────────────────────────────────────────┤\n";
            echo "│ ⚠️  Potentially Missing Implementations:\n";
            $shown = 0;
            foreach ($result['missingPaths'] as $missing) {
                if ($shown >= 5) {
                    $remaining = count($result['missingPaths']) - $shown;
                    echo "│     ... and {$remaining} more\n";
                    break;
                }
                $tags = implode(', ', $missing['tags']);
                echo "│   • [{$missing['method']}] {$missing['path']}\n";
                if ($tags) {
                    echo "│     Tags: {$tags}\n";
                }
                $shown++;
            }
        }

        echo "└──────────────────────────────────────────────────────────────────────────────┘\n\n";
    }

    public function exportJson(string $outputPath): void {
        $json = json_encode($this->results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents($outputPath, $json);
        echo "Results exported to: {$outputPath}\n";
    }

    public function exportMarkdown(string $outputPath): void {
        $md = "# DATEV PHP SDK - OpenAPI Coverage Report\n\n";
        $md .= "**API Type:** {$this->apiType}\n\n";
        $md .= "**Generated:** " . date('Y-m-d H:i:s') . "\n\n";
        $md .= "## Summary\n\n";
        $md .= "| Domain | Version | Operations | Endpoints | Coverage |\n";
        $md .= "|--------|---------|------------|-----------|----------|\n";

        foreach ($this->results as $domain => $result) {
            $coverage = $result['coverage']['resources'];
            $md .= "| {$domain} | {$result['version']} | {$result['totalPaths']} | {$result['implementedEndpoints']} | {$coverage['percentage']}% |\n";
        }

        $md .= "\n## Missing Implementations\n\n";

        foreach ($this->results as $domain => $result) {
            if (empty($result['missingPaths'])) {
                continue;
            }

            $md .= "### {$domain}\n\n";
            $md .= "| Method | Path | Summary |\n";
            $md .= "|--------|------|---------||\n";

            foreach ($result['missingPaths'] as $missing) {
                $summary = substr($missing['summary'], 0, 50);
                $md .= "| {$missing['method']} | `{$missing['path']}` | {$summary} |\n";
            }
            $md .= "\n";
        }

        file_put_contents($outputPath, $md);
        echo "Markdown report exported to: {$outputPath}\n";
    }
}

// CLI execution
if (php_sapi_name() === 'cli' && isset($argv[0]) && realpath($argv[0]) === __FILE__) {
    $options = getopt('', ['json:', 'md:', 'type:', 'all', 'help']);

    // Show help
    if (isset($options['help'])) {
        echo "DATEV PHP SDK - OpenAPI Coverage Analyzer\n\n";
        echo "Usage: php OpenApiCoverageAnalyzer.php [options]\n\n";
        echo "Options:\n";
        echo "  --type=TYPE    API type to analyze (Desktop, Online). Default: Desktop\n";
        echo "  --all          Analyze all available API types\n";
        echo "  --json=FILE    Export results as JSON\n";
        echo "  --md=FILE      Export results as Markdown\n";
        echo "  --help         Show this help message\n\n";
        echo "Available API types: " . implode(', ', OpenApiCoverageAnalyzer::getAvailableApiTypes()) . "\n";
        exit(0);
    }

    // Determine API types to analyze
    $apiTypes = [];
    if (isset($options['all'])) {
        $apiTypes = OpenApiCoverageAnalyzer::getAvailableApiTypes();
    } elseif (isset($options['type'])) {
        $apiTypes = is_array($options['type']) ? $options['type'] : [$options['type']];
    } else {
        $apiTypes = ['Desktop'];
    }

    if (empty($apiTypes)) {
        echo "No API types found. Check that docs/OpenAPI/ contains subdirectories.\n";
        exit(1);
    }

    $allResults = [];

    foreach ($apiTypes as $apiType) {
        $analyzer = new OpenApiCoverageAnalyzer(null, $apiType);
        $results = $analyzer->analyze();
        $analyzer->printReport();
        $allResults[$apiType] = $results;

        // Export with type suffix if multiple types
        if (isset($options['json'])) {
            $jsonPath = count($apiTypes) > 1
                ? preg_replace('/\.json$/', "-{$apiType}.json", $options['json'])
                : $options['json'];
            $analyzer->exportJson($jsonPath);
        }

        if (isset($options['md'])) {
            $mdPath = count($apiTypes) > 1
                ? preg_replace('/\.md$/', "-{$apiType}.md", $options['md'])
                : $options['md'];
            $analyzer->exportMarkdown($mdPath);
        }
    }

    // Show usage hint
    echo "\nUsage: php OpenApiCoverageAnalyzer.php [--type=Desktop|Online] [--all] [--json=FILE] [--md=FILE] [--help]\n";
}
