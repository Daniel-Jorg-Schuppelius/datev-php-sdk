<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiMockGenerator.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks;

/**
 * Generiert Mock-Daten aus OpenAPI-Spezifikationen.
 */
class OpenApiMockGenerator {
    private const OPENAPI_PATH = __DIR__ . '/../../docs/OpenAPI/Desktop';

    private static array $loadedSpecs = [];

    /**
     * Mapping von Domain-Namen zu OpenAPI-Dateinamen.
     */
    private static array $domainToFile = [
        'diagnostics' => 'Diagnostics and Functional Tests-1.1.2.json',
        'clientmasterdata' => 'Client Master Data-1.7.1.json',
        'master-data' => 'Client Master Data-1.7.1.json',
        'accounting' => 'Accounting-1.7.4.1.json',
        'payroll' => 'Payroll-3.1.1.json',
        'hr' => 'Payroll-3.1.1.json',
        'law' => 'Law-0.2.2.json',
        'order-management' => 'Order Management-1.4.8.json',
        'ordermanagement' => 'Order Management-1.4.8.json',
        'dms' => 'document management-2.3.1.json',
        'documentmanagement' => 'document management-2.3.1.json',
        // Beachte: Der Dateiname enthält einen En-Dash (–) statt eines normalen Bindestrichs (-)
        'iam' => "Identity and Access Management \u{2013} User Administration-1.1.2.json",
        'identitymanagement' => "Identity and Access Management \u{2013} User Administration-1.1.2.json",
        'public-sector' => 'Public Sector - Citizen Portal-1.0.4.json',
        'publicsector' => 'Public Sector - Citizen Portal-1.0.4.json',
    ];

    /**
     * Lädt eine OpenAPI-Spezifikation.
     */
    public static function loadSpec(string $domain): ?array {
        $domain = strtolower($domain);

        if (isset(self::$loadedSpecs[$domain])) {
            return self::$loadedSpecs[$domain];
        }

        if (!isset(self::$domainToFile[$domain])) {
            return null;
        }

        $filePath = self::OPENAPI_PATH . '/' . self::$domainToFile[$domain];

        if (!file_exists($filePath)) {
            return null;
        }

        $content = file_get_contents($filePath);
        if ($content === false) {
            return null;
        }

        $spec = json_decode($content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        self::$loadedSpecs[$domain] = $spec;
        return $spec;
    }

    /**
     * Extrahiert die Base-URL aus der Spezifikation.
     */
    public static function getBasePath(string $domain): string {
        $spec = self::loadSpec($domain);
        if ($spec === null) {
            return '';
        }

        // Swagger 2.0 Format
        if (isset($spec['basePath'])) {
            return '/datev/api' . str_replace('/datev/api', '', $spec['basePath']);
        }

        // OpenAPI 3.0 Format
        if (isset($spec['servers'][0]['url'])) {
            $url = $spec['servers'][0]['url'];
            // Extrahiere Pfad aus URL
            $parsed = parse_url($url);
            return $parsed['path'] ?? '';
        }

        return '';
    }

    /**
     * Extrahiert Beispiel-Responses aus der Spezifikation.
     */
    public static function extractExamples(string $domain): array {
        $spec = self::loadSpec($domain);
        if ($spec === null) {
            return [];
        }

        $basePath = self::getBasePath($domain);
        $examples = [];

        $paths = $spec['paths'] ?? [];

        foreach ($paths as $path => $methods) {
            foreach ($methods as $method => $operation) {
                if (!in_array(strtoupper($method), ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])) {
                    continue;
                }

                $fullPath = $basePath . $path;
                // Konvertiere OpenAPI-Platzhalter zu Mock-Platzhaltern
                $fullPath = preg_replace('/\{([^}]+)\}/', '*', $fullPath);

                $response = self::extractResponseExample($operation, $spec);
                if ($response !== null) {
                    $key = strtoupper($method) . ':' . $fullPath;
                    $examples[$key] = [
                        'statusCode' => 200,
                        'body' => $response,
                    ];
                }
            }
        }

        return $examples;
    }

    /**
     * Extrahiert das Beispiel aus einer Response-Definition.
     * 
     * @return string|array|null Das Beispiel als String oder Array
     */
    private static function extractResponseExample(array $operation, array $spec): string|array|null {
        $responses = $operation['responses'] ?? [];

        // Suche nach 200er Response
        $successResponse = $responses['200'] ?? $responses['201'] ?? null;
        if ($successResponse === null) {
            return null;
        }

        // Prüfe auf direkte Beispiele (Swagger 2.0)
        if (isset($successResponse['examples']['application/json'])) {
            $example = $successResponse['examples']['application/json'];
            // Manchmal sind die Beispiele in einem Wrapper
            if (is_array($example) && count($example) === 1) {
                $firstKey = array_key_first($example);
                if (is_array($example[$firstKey])) {
                    return $example[$firstKey];
                }
            }
            return $example;
        }

        // OpenAPI 3.0 Format
        if (isset($successResponse['content']['application/json']['example'])) {
            return $successResponse['content']['application/json']['example'];
        }

        if (isset($successResponse['content']['application/json']['examples'])) {
            $examples = $successResponse['content']['application/json']['examples'];
            $firstExample = reset($examples);
            return $firstExample['value'] ?? null;
        }

        // Schema-basierte Generierung
        $schema = $successResponse['schema'] ??
            $successResponse['content']['application/json']['schema'] ?? null;

        if ($schema !== null) {
            return self::generateFromSchema($schema, $spec);
        }

        return null;
    }

    /**
     * Generiert Mock-Daten aus einem Schema.
     */
    private static function generateFromSchema(array $schema, array $spec, int $depth = 0): mixed {
        if ($depth > 5) {
            return null; // Verhindere unendliche Rekursion
        }

        // Referenz auflösen
        if (isset($schema['$ref'])) {
            $schema = self::resolveRef($schema['$ref'], $spec);
            if ($schema === null) {
                return null;
            }
        }

        $type = $schema['type'] ?? 'object';

        switch ($type) {
            case 'array':
                $items = $schema['items'] ?? [];
                $itemData = self::generateFromSchema($items, $spec, $depth + 1);
                return $itemData !== null ? [$itemData] : [];

            case 'object':
                $properties = $schema['properties'] ?? [];
                $result = [];
                foreach ($properties as $propName => $propSchema) {
                    $result[$propName] = self::generateFromSchema($propSchema, $spec, $depth + 1);
                }
                return $result;

            case 'string':
                if (isset($schema['enum'])) {
                    return $schema['enum'][0];
                }
                if (isset($schema['format'])) {
                    return match ($schema['format']) {
                        'date' => '2024-01-15',
                        'date-time' => '2024-01-15T10:30:00.000',
                        'uuid' => '550e8400-e29b-41d4-a716-446655440000',
                        'email' => 'test@example.com',
                        'uri', 'url' => 'https://example.com',
                        default => 'string-value',
                    };
                }
                return $schema['example'] ?? 'mock-string';

            case 'integer':
            case 'number':
                return $schema['example'] ?? $schema['minimum'] ?? 1;

            case 'boolean':
                return $schema['example'] ?? true;

            default:
                return null;
        }
    }

    /**
     * Löst eine $ref-Referenz auf.
     */
    private static function resolveRef(string $ref, array $spec): ?array {
        // Format: #/definitions/TypeName oder #/components/schemas/TypeName
        $parts = explode('/', trim($ref, '#/'));

        $current = $spec;
        foreach ($parts as $part) {
            if (!isset($current[$part])) {
                return null;
            }
            $current = $current[$part];
        }

        return $current;
    }

    /**
     * Registriert alle Mock-Responses aus einer OpenAPI-Spezifikation.
     */
    public static function registerFromOpenApi(MockClient $client, string $domain): MockClient {
        $examples = self::extractExamples($domain);
        return $client->registerMockResponses($examples);
    }

    /**
     * Registriert alle verfügbaren OpenAPI-Spezifikationen.
     */
    public static function registerAllFromOpenApi(MockClient $client): MockClient {
        $domains = ['diagnostics', 'clientmasterdata', 'accounting', 'payroll', 'law', 'ordermanagement', 'dms', 'iam', 'publicsector'];

        foreach ($domains as $domain) {
            self::registerFromOpenApi($client, $domain);
        }

        return $client;
    }

    /**
     * Erstellt einen vollständig konfigurierten MockClient mit OpenAPI-Daten.
     */
    public static function createMockClientFromOpenApi(string $domain = null): MockClient {
        $client = new MockClient();

        if ($domain !== null) {
            self::registerFromOpenApi($client, $domain);
        } else {
            self::registerAllFromOpenApi($client);
        }

        return $client;
    }

    /**
     * Gibt alle verfügbaren Domains zurück.
     */
    public static function getAvailableDomains(): array {
        return array_keys(self::$domainToFile);
    }

    /**
     * Gibt die Anzahl der extrahierten Endpoints für eine Domain zurück.
     */
    public static function getEndpointCount(string $domain): int {
        return count(self::extractExamples($domain));
    }
}
