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

use Datev\API\Online\OnlineService;

/**
 * Generiert Mock-Daten aus OpenAPI-Spezifikationen.
 *
 * Desktop-Domains werden über die statische Dateizuordnung aufgelöst,
 * Online-Domains ("online-<service>") versionsunabhängig über
 * OnlineService::specFilePattern(). Online-Mock-Keys sind dienst-relativ
 * (ohne Basispfad), passend zu den URIs der Online-Endpoints.
 */
class OpenApiMockGenerator {
    private const OPENAPI_PATH = __DIR__ . '/../../docs/OpenAPI';

    private static array $loadedSpecs = [];

    /**
     * Mapping von Domain-Namen zu OpenAPI-Dateinamen (Desktop).
     */
    private static array $domainToFile = [
        'diagnostics' => 'Desktop/Diagnostics and Functional Tests-1.1.2.json',
        'clientmasterdata' => 'Desktop/Client Master Data-1.7.1.json',
        'master-data' => 'Desktop/Client Master Data-1.7.1.json',
        'accounting' => 'Desktop/Accounting-1.7.4.1.json',
        'payroll' => 'Desktop/Payroll-3.1.1.json',
        'hr' => 'Desktop/Payroll-3.1.1.json',
        'law' => 'Desktop/Law-0.2.2.json',
        'order-management' => 'Desktop/Order Management-1.4.8.json',
        'ordermanagement' => 'Desktop/Order Management-1.4.8.json',
        'dms' => 'Desktop/document management-2.3.1.json',
        'documentmanagement' => 'Desktop/document management-2.3.1.json',
        // Beachte: Der Dateiname enthält einen En-Dash (–) statt eines normalen Bindestrichs (-)
        'iam' => "Desktop/Identity and Access Management \u{2013} User Administration-1.1.2.json",
        'identitymanagement' => "Desktop/Identity and Access Management \u{2013} User Administration-1.1.2.json",
        'public-sector' => 'Desktop/Public Sector - Citizen Portal-1.0.4.json',
        'publicsector' => 'Desktop/Public Sector - Citizen Portal-1.0.4.json',
    ];

    /**
     * Prüft, ob es sich um eine Online-Domain ("online-<service>") handelt.
     */
    private static function isOnlineDomain(string $domain): bool {
        return str_starts_with(strtolower($domain), 'online-');
    }

    /**
     * Löst eine Online-Domain auf den zugehörigen OnlineService auf.
     */
    private static function resolveOnlineService(string $domain): ?OnlineService {
        return OnlineService::tryFrom(substr(strtolower($domain), strlen('online-')));
    }

    /**
     * Lädt eine OpenAPI-Spezifikation.
     */
    public static function loadSpec(string $domain): ?array {
        $domain = strtolower($domain);

        if (isset(self::$loadedSpecs[$domain])) {
            return self::$loadedSpecs[$domain];
        }

        if (self::isOnlineDomain($domain)) {
            $service = self::resolveOnlineService($domain);
            if ($service === null) {
                return null;
            }
            $files = glob(self::OPENAPI_PATH . '/Online/' . $service->specFilePattern() . '*.json');
            $filePath = $files[0] ?? null;
        } elseif (isset(self::$domainToFile[$domain])) {
            $filePath = self::OPENAPI_PATH . '/' . self::$domainToFile[$domain];
        } else {
            return null;
        }

        if ($filePath === null || !file_exists($filePath)) {
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
     *
     * Online-Domains liefern '' zurück: die Mock-Keys sind dienst-relativ,
     * weil der Online-Client den Basispfad selbst voranstellt und der
     * MockClient die unpräfixierten URIs der Endpoints sieht.
     */
    public static function getBasePath(string $domain): string {
        if (self::isOnlineDomain($domain)) {
            return '';
        }

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
     *
     * Desktop: unverändertes Verhalten (nur 200/201, Statuscode immer 200).
     * Online: echte Statuscodes (200/201/202/204), Response-Header
     * (Location, Retry-After, Link, Total-Items, x-*-page*) und
     * Nicht-JSON-Content-Types (pdf/zip/ndjson).
     */
    public static function extractExamples(string $domain): array {
        $spec = self::loadSpec($domain);
        if ($spec === null) {
            return [];
        }

        $isOnline = self::isOnlineDomain($domain);
        $basePath = self::getBasePath($domain);
        $examples = [];

        $paths = $spec['paths'] ?? [];

        foreach ($paths as $path => $methods) {
            foreach ($methods as $method => $operation) {
                if (!in_array(strtoupper($method), ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])) {
                    continue;
                }

                $fullPath = $isOnline ? ltrim($path, '/') : $basePath . $path;
                // Konvertiere OpenAPI-Platzhalter zu Mock-Platzhaltern
                $fullPath = preg_replace('/\{([^}]+)\}/', '*', $fullPath);
                $key = strtoupper($method) . ':' . $fullPath;

                if ($isOnline) {
                    $registration = self::extractOnlineResponse($operation, $spec);
                    if ($registration !== null) {
                        $examples[$key] = $registration;
                    }
                    continue;
                }

                $response = self::extractResponseExample($operation, $spec);
                if ($response !== null) {
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
     * Extrahiert die vollständige Mock-Registrierung (Status, Body, Header)
     * für eine Online-Operation: erste 2xx-Response der Operation.
     *
     * @return array{statusCode: int, body: mixed, headers: array<string, string>}|null
     */
    private static function extractOnlineResponse(array $operation, array $spec): ?array {
        $responses = $operation['responses'] ?? [];

        $codes = array_filter(array_keys($responses), fn ($code) => is_numeric($code) && (int) $code >= 200 && (int) $code < 300);
        if (empty($codes)) {
            return null;
        }
        sort($codes);
        $code = (int) $codes[0];
        $response = $responses[$codes[0]];

        if (isset($response['$ref'])) {
            $response = self::resolveRef($response['$ref'], $spec) ?? [];
        }

        $headers = self::mockHeadersFromResponse($response);

        if ($code === 204) {
            return ['statusCode' => 204, 'body' => null, 'headers' => $headers];
        }

        [$body, $contentType] = self::mockBodyFromResponse($response, $spec);
        $headers['Content-Type'] = $contentType;

        return ['statusCode' => $code, 'body' => $body, 'headers' => $headers];
    }

    /**
     * Erzeugt den Mock-Body samt Content-Type für eine Response-Definition
     * (OpenAPI 3.0 content-Map oder Swagger 2.0 schema/examples).
     *
     * @return array{0: mixed, 1: string}
     */
    private static function mockBodyFromResponse(array $response, array $spec): array {
        // Swagger 2.0: examples/schema direkt an der Response
        if (isset($response['examples']['application/json'])) {
            return [$response['examples']['application/json'], 'application/json'];
        }
        if (isset($response['schema'])) {
            return [self::generateFromSchema($response['schema'], $spec), 'application/json'];
        }

        $content = $response['content'] ?? [];

        foreach ($content as $contentType => $definition) {
            $baseType = strtolower(trim(explode(';', $contentType)[0]));

            if ($baseType === 'application/json' || $baseType === '*/*') {
                $body = $definition['example'] ?? null;

                if ($body === null && !empty($definition['examples']) && is_array($definition['examples'])) {
                    $firstExample = reset($definition['examples']);
                    $body = is_array($firstExample) ? ($firstExample['value'] ?? null) : null;
                }

                if ($body === null && isset($definition['schema'])) {
                    $body = self::generateFromSchema($definition['schema'], $spec);
                }

                return [$body, 'application/json'];
            }

            if ($baseType === 'application/x-ndjson') {
                $data = isset($definition['schema']) ? self::generateFromSchema($definition['schema'], $spec) : null;
                $rows = is_array($data) && array_is_list($data) ? $data : [$data];
                $body = implode("\n", array_map(fn ($row) => json_encode($row), $rows));

                return [$body, 'application/x-ndjson'];
            }

            if ($baseType === 'application/pdf') {
                return ['%PDF-1.4 mock', 'application/pdf'];
            }

            if ($baseType === 'application/zip' || $baseType === 'application/octet-stream') {
                return ['PK-mock', $baseType];
            }
        }

        // Kein Content definiert (z. B. 201/202 ohne Body)
        return [null, 'application/json'];
    }

    /**
     * Erzeugt Mock-Werte für die in der Spezifikation deklarierten Response-Header.
     *
     * @return array<string, string>
     */
    private static function mockHeadersFromResponse(array $response): array {
        $headers = [];

        foreach ($response['headers'] ?? [] as $name => $definition) {
            $example = $definition['example']
                ?? $definition['schema']['example']
                ?? null;

            if ($example !== null) {
                $headers[$name] = (string) (is_scalar($example) ? $example : json_encode($example));
                continue;
            }

            $headers[$name] = match (strtolower($name)) {
                'location' => 'jobs/550e8400-e29b-41d4-a716-446655440000',
                'retry-after' => '1',
                'link' => '<clients?skip=0&top=100>; rel="self"',
                'total-items' => '1',
                'x-current-page' => '1',
                'x-page-size' => '100',
                'x-total-count' => '1',
                'x-total-pages' => '1',
                default => 'mock-value',
            };
        }

        return $headers;
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
    public static function createMockClientFromOpenApi(?string $domain = null): MockClient {
        $client = new MockClient;

        if ($domain !== null) {
            self::registerFromOpenApi($client, $domain);
        } else {
            self::registerAllFromOpenApi($client);
        }

        return $client;
    }

    /**
     * Gibt alle verfügbaren Domains zurück (Desktop + Online).
     */
    public static function getAvailableDomains(): array {
        $onlineDomains = array_map(fn (OnlineService $service) => $service->mockDomain(), OnlineService::cases());

        return array_merge(array_keys(self::$domainToFile), $onlineDomains);
    }

    /**
     * Gibt die Anzahl der extrahierten Endpoints für eine Domain zurück.
     */
    public static function getEndpointCount(string $domain): int {
        return count(self::extractExamples($domain));
    }
}
