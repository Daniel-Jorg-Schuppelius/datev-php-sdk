<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiProbe.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Support;

use APIToolkit\Contracts\Abstracts\{AbstractUuid, NamedEntity, NamedValue, NamedValues};
use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Entities\ID;
use BackedEnum;
use Error;
use Psr\Log\{LoggerInterface, NullLogger};
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionProperty;
use ReflectionType;
use ReflectionUnionType;
use stdClass;
use Tests\Mocks\MockClient;
use Throwable;

/**
 * Ruft jede öffentliche Methode der Endpunkte mit Platzhalterwerten gegen einen
 * aufzeichnenden Client auf und ordnet die Requests den Operationen der
 * OpenAPI-Dateien unter docs/OpenAPI zu.
 */
final class OpenApiProbe {
    public const UUID = '11111111-2222-4333-8444-555555555555';

    /** Online-Endpunktordner → Präfix der zugehörigen Spec-Datei. */
    private const ONLINE_SPECS = [
        'AccountingClients' => 'accounting-clients',
        'AccountingDataExchange' => 'Accounting Data Exchange',
        'AccountingDocuments' => 'accounting_documents',
        'AccountingDxsoJobs' => 'accounting_dxso-jobs',
        'AccountingExtfFiles' => 'accounting_extf-files',
        'CashRegister' => 'cashregister_import',
        'HrDocuments' => 'DATEV Datenservice Dokumente',
        'HrEau' => 'hr_eau',
        'HrExchange' => 'hr_exchange',
        'HrExports' => 'hr_exports',
        'HrFiles' => 'hr_files',
        'HrPayrollReports' => 'hr_payrollreports',
        'MasterClientsHealth' => 'master-data_master-clients-health',
        'MyTaxHealth' => 'my-tax_mytax',
    ];

    /** @var array<string, list<array{endpoint: string, operation: string, method: string, path: string, suffix: string, returns: class-string|null, template: array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}|null}>> */
    private static array $calls = [];

    /** @var array<string, list<array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}>> */
    private static array $templates = [];

    /**
     * Alle aufgezeichneten Requests eines API-Typs mit zugeordneter Spec-Operation (oder null).
     *
     * @return list<array{endpoint: string, operation: string, method: string, path: string, suffix: string, returns: class-string|null, template: array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}|null}>
     */
    public static function calls(string $kind): array {
        if (isset(self::$calls[$kind])) {
            return self::$calls[$kind];
        }

        $root = dirname(__DIR__, 2) . "/src/API/{$kind}/Endpoints";
        $calls = [];

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $relative = str_replace(['/', '.php'], ['\\', ''], substr($file->getPathname(), strlen($root) + 1));
            $class = "Datev\\API\\{$kind}\\Endpoints\\{$relative}";
            if (!class_exists($class)) {
                continue;
            }

            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                continue;
            }

            $suffix = trim((string) $reflection->getProperty('endpointSuffix')->getDefaultValue(), '/');
            $templates = self::templatesFor($kind, $relative);

            foreach (self::operations($reflection) as $method) {
                $client = new MockClient;
                $endpoint = self::instantiate($reflection, $client);
                if ($endpoint === null) {
                    continue;
                }

                self::applySetters($reflection, $endpoint);

                try {
                    $method->invoke($endpoint, ...self::arguments($method));
                } catch (Throwable $e) {
                    self::failOnRecursion($e);
                    // 404 des Mock-Clients oder fehlende Pflichtwerte; nur der Request zählt.
                }

                foreach ($client->getRecordedRequests() as $recorded) {
                    $path = (string) parse_url($recorded['uri'], PHP_URL_PATH);
                    if ($kind === 'Online') {
                        $path = ltrim($path, '/');
                    }
                    $httpMethod = strtoupper($recorded['method']);

                    $calls[] = [
                        'endpoint' => $relative,
                        'operation' => "{$relative}::{$method->getName()}",
                        'method' => $httpMethod,
                        'path' => $path,
                        'suffix' => $suffix,
                        'returns' => self::returnedEntity($method),
                        'template' => self::match($templates, $httpMethod, $path),
                    ];
                }
            }
        }

        return self::$calls[$kind] = $calls;
    }

    /**
     * Schema der Erfolgsantwort einer Operation; bei Listen das Schema eines Elements.
     *
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $operation
     * @return array<string, mixed>|null
     */
    public static function responseItemSchema(array $spec, array $operation, bool $list): ?array {
        foreach (['200', '201'] as $code) {
            $response = isset($operation['responses'][$code]) ? self::resolve($spec, $operation['responses'][$code]) : null;
            $schema = $response['schema'] ?? null;
            foreach ($response['content'] ?? [] as $type => $content) {
                if ($schema === null && str_contains((string) $type, 'json')) {
                    $schema = $content['schema'] ?? null;
                }
            }
            if (!is_array($schema)) {
                continue;
            }

            $resolved = self::resolve($spec, $schema);
            if (($resolved['type'] ?? '') === 'array') {
                return self::resolve($spec, $resolved['items'] ?? []);
            }
            if ($list) {
                // Listen in einer Hülle (SCIM "Resources", "content" …)
                foreach ($resolved['properties'] ?? [] as $property) {
                    $property = self::resolve($spec, $property);
                    if (($property['type'] ?? '') === 'array' && isset(self::resolve($spec, $property['items'] ?? [])['properties'])) {
                        return self::resolve($spec, $property['items']);
                    }
                }
            }

            return $resolved;
        }

        return null;
    }

    /**
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $schema
     * @return array<string, mixed>
     */
    public static function resolve(array $spec, array $schema): array {
        while (isset($schema['$ref'])) {
            $node = $spec;
            foreach (explode('/', substr($schema['$ref'], 2)) as $segment) {
                $node = $node[$segment];
            }
            $schema = $node;
        }

        if (isset($schema['allOf'])) {
            $merged = ['type' => 'object', 'properties' => []] + $schema;
            foreach ($schema['allOf'] as $part) {
                $part = self::resolve($spec, $part);
                $merged['properties'] += $part['properties'] ?? [];
                if (!isset($part['properties']) && isset($part['type'])) {
                    $merged['type'] = $part['type'];
                }
            }
            unset($merged['allOf']);
            if ($merged['properties'] === []) {
                unset($merged['properties']);
            }

            return $merged;
        }

        return $schema;
    }

    /**
     * Beispielwert aus dem Schema; Felder mit Enum-Typ in der Entität bekommen einen gültigen Fall.
     *
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $schema
     * @param class-string|null $entity
     */
    public static function example(array $spec, array $schema, ?string $entity, int $depth = 0): mixed {
        $schema = self::resolve($spec, $schema);
        $type = $schema['type'] ?? (isset($schema['properties']) ? 'object' : 'string');

        if (isset($schema['enum'])) {
            return $schema['enum'][0];
        }

        if ($type === 'object' && isset($schema['properties'])) {
            if ($depth > 4) {
                return new stdClass;
            }

            $object = [];
            foreach ($schema['properties'] as $name => $property) {
                $object[$name] = self::example($spec, $property, null, $depth + 1);
                $propertyType = $entity !== null && property_exists($entity, $name) ? (new ReflectionProperty($entity, $name))->getType() : null;
                if ($propertyType instanceof ReflectionNamedType && !$propertyType->isBuiltin()) {
                    $object[$name] = self::exampleForType($spec, $property, $propertyType->getName(), $object[$name], $depth);
                }
            }

            return $object;
        }

        if ($type === 'array') {
            return [self::example($spec, $schema['items'] ?? [], null, $depth + 1)];
        }

        if (array_key_exists('example', $schema)) {
            return $schema['example'];
        }

        return match ($type) {
            'integer' => 7,
            'number' => 1.5,
            'boolean' => true,
            'object' => [],
            default => match (strtolower((string) ($schema['format'] ?? ''))) {
                'date-time', 'datetime' => '2024-01-01T00:00:00+01:00',
                'date' => '2024-01-01',
                default => 'x',
            },
        };
    }

    /**
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $property
     */
    private static function exampleForType(array $spec, array $property, string $type, mixed $value, int $depth): mixed {
        if (is_subclass_of($type, BackedEnum::class) && !isset(self::resolve($spec, $property)['enum'])) {
            return $type::cases()[0]->value;
        }
        if (is_subclass_of($type, NamedEntity::class)) {
            return self::example($spec, $property, $type, $depth + 1);
        }
        if (is_subclass_of($type, NamedValues::class)) {
            $item = self::listItemClass($type);
            $items = self::resolve($spec, $property)['items'] ?? null;

            return ($item !== null && is_array($items)) ? [self::example($spec, $items, $item, $depth + 1)] : $value;
        }

        return $value;
    }

    /**
     * Feldname gültig als PHP-Property? NamedEntity bildet JSON-Schlüssel direkt auf Properties ab.
     */
    public static function mappable(string $name): bool {
        return preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name) === 1;
    }

    /**
     * @param class-string $listClass
     * @return class-string|null
     */
    public static function listItemClass(string $listClass): ?string {
        try {
            $item = (new ReflectionClass($listClass))->getProperty('valueClassName')->getValue(new $listClass);
        } catch (Throwable $e) {
            self::failOnRecursion($e);
            return null;
        }

        return is_string($item) && class_exists($item) ? $item : null;
    }

    /**
     * @param ReflectionClass<object> $reflection
     * @return list<ReflectionMethod>
     */
    private static function operations(ReflectionClass $reflection): array {
        return array_values(array_filter(
            $reflection->getMethods(ReflectionMethod::IS_PUBLIC),
            static fn (ReflectionMethod $method): bool => str_starts_with($method->getDeclaringClass()->getName(), 'Datev\\')
                && !$method->isConstructor()
                && !$method->isStatic()
                && !str_starts_with($method->getName(), 'set')
        ));
    }

    /**
     * @param ReflectionClass<object> $reflection
     */
    private static function instantiate(ReflectionClass $reflection, MockClient $client): ?object {
        $arguments = [];

        foreach ($reflection->getConstructor()?->getParameters() ?? [] as $parameter) {
            $type = $parameter->getType();
            $name = $type instanceof ReflectionNamedType ? $type->getName() : '';

            $arguments[] = match (true) {
                is_a($name, ApiClientInterface::class, true) => $client,
                is_a($name, LoggerInterface::class, true) => new NullLogger,
                $parameter->getName() === 'fiscalYearId' => '20240101',
                $parameter->getName() === 'personnelNumber' => '00001',
                $parameter->isOptional() && !$type instanceof ReflectionUnionType => $parameter->getDefaultValue(),
                default => self::dummy($type) ?? ($parameter->isOptional() ? $parameter->getDefaultValue() : null),
            };
        }

        try {
            return $reflection->newInstanceArgs($arguments);
        } catch (Throwable $e) {
            self::failOnRecursion($e);
            return null;
        }
    }

    /**
     * @param ReflectionClass<object> $reflection
     */
    private static function applySetters(ReflectionClass $reflection, object $endpoint): void {
        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $setter) {
            if (!str_starts_with($setter->getName(), 'set') || $setter->getNumberOfParameters() !== 1) {
                continue;
            }

            $value = self::dummy($setter->getParameters()[0]->getType());
            if ($value === null) {
                continue;
            }

            try {
                $setter->invoke($endpoint, $value);
            } catch (Throwable $e) {
                self::failOnRecursion($e);
                // Setter mit zusätzlicher Prüfung; der Aufruf läuft dann ohne diesen Wert.
            }
        }
    }

    /**
     * @return list<mixed>
     */
    private static function arguments(ReflectionMethod $method): array {
        $arguments = [];

        foreach ($method->getParameters() as $parameter) {
            $type = $parameter->getType();
            $isId = $type instanceof ReflectionNamedType && is_a($type->getName(), ID::class, true);

            $arguments[] = ($parameter->isOptional() && $parameter->getDefaultValue() !== null && !$isId)
                ? $parameter->getDefaultValue()
                : (self::dummy($type) ?? ($parameter->isOptional() ? $parameter->getDefaultValue() : null));
        }

        return $arguments;
    }

    private static function dummy(?ReflectionType $type): mixed {
        if ($type instanceof ReflectionUnionType) {
            foreach ($type->getTypes() as $part) {
                if ($part instanceof ReflectionNamedType && $part->getName() === 'string') {
                    return '12345-67890';
                }
            }
            foreach ($type->getTypes() as $part) {
                $value = self::dummy($part);
                if ($value !== null) {
                    return $value;
                }
            }

            return null;
        }

        if (!$type instanceof ReflectionNamedType) {
            return null;
        }

        $name = $type->getName();

        return match (true) {
            $name === 'int' => 5,
            $name === 'string' => 's1',
            $name === 'bool' => false,
            $name === 'float' => 1.0,
            $name === 'array' => [],
            $name === ID::class => new ID(77),
            is_a($name, AbstractUuid::class, true) => new $name(self::UUID),
            is_a($name, ID::class, true) => new $name(42),
            class_exists($name) && !(new ReflectionClass($name))->isAbstract() => self::create($name),
            default => null,
        };
    }

    /**
     * Endlosrekursion ist ein echter Fehler: PHP 8.2 stürzt dabei ab, ab 8.3 bliebe der Error sonst unbemerkt.
     */
    private static function failOnRecursion(Throwable $e): void {
        if ($e instanceof Error && str_contains($e->getMessage(), 'Maximum call stack size')) {
            throw $e;
        }
    }

    private static function create(string $class): ?object {
        try {
            return new $class;
        } catch (Throwable $e) {
            self::failOnRecursion($e);
            return null;
        }
    }

    /**
     * @return class-string|null
     */
    private static function returnedEntity(ReflectionMethod $method): ?string {
        $type = $method->getReturnType();
        if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
            return null;
        }

        $name = $type->getName();

        return is_subclass_of($name, NamedEntity::class) || is_subclass_of($name, NamedValues::class) ? $name : null;
    }

    /**
     * @return list<array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}>
     */
    private static function templatesFor(string $kind, string $relative): array {
        if ($kind === 'Online') {
            $folder = explode('\\', $relative)[0];
            $files = glob(dirname(__DIR__, 2) . '/docs/OpenAPI/Online/' . (self::ONLINE_SPECS[$folder] ?? '-') . '*.json') ?: [];

            return self::$templates["Online:{$folder}"] ??= $files === [] ? [] : self::parse($files[0], true);
        }

        if (!isset(self::$templates['Desktop'])) {
            $all = [];
            foreach (glob(dirname(__DIR__, 2) . '/docs/OpenAPI/Desktop/*.json') ?: [] as $file) {
                $all = array_merge($all, self::parse($file, false));
            }
            // Der spezifischste Pfad gewinnt (/clients/deletion-log vor /clients/{client-id}).
            usort($all, static fn (array $a, array $b): int => substr_count($a['path'], '{') <=> substr_count($b['path'], '{'));
            self::$templates['Desktop'] = $all;
        }

        return self::$templates['Desktop'];
    }

    /**
     * @return list<array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}>
     */
    private static function parse(string $file, bool $relative): array {
        $spec = json_decode((string) file_get_contents($file), true);
        if (!is_array($spec)) {
            return [];
        }

        // OpenAPI 3 nennt den Basispfad in servers, Swagger 2 in basePath; Online-Pfade sind dienstrelativ.
        $bases = $relative ? [''] : (isset($spec['servers'])
            ? array_map(static fn (array $server): string => (string) parse_url($server['url'], PHP_URL_PATH), $spec['servers'])
            : [(string) ($spec['basePath'] ?? '')]);

        $templates = [];
        foreach ($spec['paths'] as $path => $operations) {
            foreach ($operations as $httpMethod => $operation) {
                if (!in_array($httpMethod, ['get', 'post', 'put', 'patch', 'delete'], true)) {
                    continue;
                }

                foreach (array_unique($bases) as $base) {
                    $full = $relative ? ltrim($path, '/') : rtrim($base, '/') . $path;
                    $pattern = preg_replace('#\\\\\{[^/]+?\\\\\}#', '[^/]+', preg_quote($full, '#'));
                    $templates[] = ['method' => strtoupper($httpMethod), 'pattern' => "#^{$pattern}$#", 'spec' => $spec, 'operation' => $operation, 'path' => $path];
                }
            }
        }

        return $templates;
    }

    /**
     * @param list<array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}> $templates
     * @return array{method: string, pattern: string, spec: array<string, mixed>, operation: array<string, mixed>, path: string}|null
     */
    private static function match(array $templates, string $method, string $path): ?array {
        foreach ($templates as $template) {
            if ($template['method'] === $method && preg_match($template['pattern'], $path) === 1) {
                return $template;
            }
        }

        return null;
    }

    /**
     * NamedValue-Typen (ID, IBAN, E-Mail …) tragen einen Skalar; für die Typprüfung gelten sie als skalar.
     */
    public static function isScalarValue(string $type): bool {
        return is_subclass_of($type, NamedValue::class);
    }
}
