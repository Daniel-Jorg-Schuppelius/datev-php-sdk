<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiResponseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\API;

use APIToolkit\Contracts\Abstracts\{NamedEntity, NamedValues};
use BackedEnum;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ReflectionNamedType;
use ReflectionProperty;
use Tests\Support\OpenApiProbe;
use Throwable;

/**
 * Für jede GET-Operation der Endpunkte: Das Antwortschema der Spec muss vollständig
 * und typgerecht in der zurückgegebenen Entität ankommen.
 *
 * Schlüssel, die kein PHP-Bezeichner sind ("time_costs (sales_value)", SCIM "$ref"),
 * kann NamedEntity nicht abbilden; sie bleiben außen vor.
 */
final class OpenApiResponseTest extends TestCase {
    /**
     * Felder, deren PHP-Typ bewusst von der Spec-Deklaration abweicht.
     */
    private const ACCEPTED_TYPES = [
        'Accounting\AccountingSumsAndBalances\MonthValue::month' => 'Spec: Text "1" bis "12"; int liest verlustfrei.',
        'Accounting\Clients\Client::company_data' => 'Einfeld-Objekt {creditor_identifier}, als NamedValue abgebildet.',
        'Accounting\Clients\Client::number' => 'Ziffernfolge; alle anderen Dienste führen die Mandantennummer als Ganzzahl (gemeinsame Basisklasse).',
        'DocumentManagement\Documents\States\DocumentState::valid_document_classes' => 'Spec deklariert integer, das Beispiel [1, 3, 5] ist eine Liste.',
        'IdentityAndAccessManagement\ServiceProvider\ScimBulk::max_operations' => 'Spec: number; der Wert ist eine Anzahl.',
        'IdentityAndAccessManagement\ServiceProvider\ScimBulk::max_payload_size' => 'Spec: number; der Wert ist eine Anzahl.',
        'IdentityAndAccessManagement\ServiceProvider\ScimFilter::max_results' => 'Spec: number; der Wert ist eine Anzahl.',
    ];

    /** @var array<string, list<array{operation: string, entity: class-string, spec: array<string, mixed>, schema: array<string, mixed>}>> */
    private static array $responses = [];

    /**
     * @return array<string, array{0: string}>
     */
    public static function kinds(): array {
        return ['Desktop' => ['Desktop'], 'Online' => ['Online']];
    }

    #[DataProvider('kinds')]
    public function test_every_response_field_survives_the_entity(string $kind): void {
        $violations = [];

        foreach ($this->responses($kind) as $response) {
            $example = OpenApiProbe::example($response['spec'], $response['schema'], $response['entity']);
            if (!is_array($example) || $example === []) {
                continue;
            }

            try {
                $result = $response['entity']::fromJson((string) json_encode($example))->toArray();
            } catch (Throwable $e) {
                $violations[] = "{$response['operation']}: " . $e->getMessage();
                continue;
            }

            foreach ($this->missing($example, $result) as $field) {
                $violations[] = "{$response['operation']} → " . self::short($response['entity']) . ": {$field}";
            }
        }

        $this->assertSame([], array_values(array_unique($violations)), 'Felder der Spec gehen beim Einlesen verloren.');
    }

    #[DataProvider('kinds')]
    public function test_field_types_match_the_spec(string $kind): void {
        $violations = [];

        foreach ($this->fields($kind) as [$entity, $name, $schema, $type]) {
            $key = self::short($entity) . "::{$name}";
            if (!isset(self::ACCEPTED_TYPES[$key]) && !$this->compatible($type, $schema)) {
                $violations[$key] = "{$key}: PHP {$type}, Spec " . json_encode(array_intersect_key($schema, array_flip(['type', 'format', 'enum'])));
            }
        }

        $this->assertSame([], array_values($violations), 'Feldtyp passt nicht zur Spec; der Wert ginge verloren.');
    }

    #[DataProvider('kinds')]
    public function test_enums_know_every_spec_value(string $kind): void {
        $violations = [];

        foreach ($this->fields($kind) as [$entity, $name, $schema, $type]) {
            if (!isset($schema['enum']) || !is_subclass_of($type, BackedEnum::class)) {
                continue;
            }

            $known = array_map(static fn (BackedEnum $case): string => (string) $case->value, $type::cases());
            $unknown = array_diff(array_map('strval', array_filter($schema['enum'], static fn (mixed $v): bool => $v !== null && $v !== '')), $known);
            if ($unknown !== []) {
                $violations[$type] = self::short($entity) . "::{$name} ({$type}): " . implode(', ', $unknown);
            }
        }

        $this->assertSame([], array_values($violations), 'Enum kennt nicht alle Werte der Spec.');
    }

    public function test_accepted_type_deviations_still_apply(): void {
        $seen = [];
        foreach (['Desktop', 'Online'] as $kind) {
            foreach ($this->fields($kind) as [$entity, $name, $schema, $type]) {
                if (!$this->compatible($type, $schema)) {
                    $seen[self::short($entity) . "::{$name}"] = true;
                }
            }
        }

        $this->assertSame([], array_keys(array_diff_key(self::ACCEPTED_TYPES, $seen)), 'Ausnahmen ohne Wirkung: Eintrag entfernen.');
    }

    /**
     * @return list<array{operation: string, entity: class-string, spec: array<string, mixed>, schema: array<string, mixed>}>
     */
    private function responses(string $kind): array {
        if (isset(self::$responses[$kind])) {
            return self::$responses[$kind];
        }

        $responses = [];
        foreach (OpenApiProbe::calls($kind) as $call) {
            if ($call['method'] !== 'GET' || $call['template'] === null || $call['returns'] === null) {
                continue;
            }

            $list = is_subclass_of($call['returns'], NamedValues::class);
            $entity = $list ? OpenApiProbe::listItemClass($call['returns']) : $call['returns'];
            if ($entity === null || !is_subclass_of($entity, NamedEntity::class)) {
                continue;
            }

            $schema = OpenApiProbe::responseItemSchema($call['template']['spec'], $call['template']['operation'], $list);
            if ($schema === null || !isset($schema['properties'])) {
                continue;
            }

            $responses[] = ['operation' => $call['operation'], 'entity' => $entity, 'spec' => $call['template']['spec'], 'schema' => $schema];
        }

        $this->assertNotEmpty($responses);

        return self::$responses[$kind] = $responses;
    }

    /**
     * Alle Feldpaare Entität ↔ Schema, auch in verschachtelten Objekten und Listen.
     *
     * @return list<array{0: class-string, 1: string, 2: array<string, mixed>, 3: string}>
     */
    private function fields(string $kind): array {
        $fields = [];
        $visited = [];

        foreach ($this->responses($kind) as $response) {
            $this->collect($response['entity'], $response['spec'], $response['schema'], $fields, $visited);
        }

        return $fields;
    }

    /**
     * @param class-string $entity
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $schema
     * @param list<array{0: class-string, 1: string, 2: array<string, mixed>, 3: string}> $fields
     * @param array<string, true> $visited
     */
    private function collect(string $entity, array $spec, array $schema, array &$fields, array &$visited, int $depth = 0): void {
        $key = $entity . md5((string) json_encode($schema));
        if ($depth > 5 || isset($visited[$key])) {
            return;
        }
        $visited[$key] = true;

        foreach (OpenApiProbe::resolve($spec, $schema)['properties'] ?? [] as $name => $property) {
            if (!is_string($name) || !OpenApiProbe::mappable($name) || !property_exists($entity, $name)) {
                continue;
            }

            $type = (new ReflectionProperty($entity, $name))->getType();
            if (!$type instanceof ReflectionNamedType) {
                continue;
            }

            $property = OpenApiProbe::resolve($spec, $property);
            $fields[] = [$entity, $name, $property, $type->getName()];

            if (is_subclass_of($type->getName(), NamedEntity::class) && isset($property['properties'])) {
                $this->collect($type->getName(), $spec, $property, $fields, $visited, $depth + 1);
            } elseif (is_subclass_of($type->getName(), NamedValues::class) && ($property['type'] ?? '') === 'array') {
                $item = OpenApiProbe::listItemClass($type->getName());
                $items = OpenApiProbe::resolve($spec, $property['items'] ?? []);
                if ($item !== null && is_subclass_of($item, NamedEntity::class) && isset($items['properties'])) {
                    $this->collect($item, $spec, $items, $fields, $visited, $depth + 1);
                }
            }
        }
    }

    /**
     * @param array<string, mixed> $schema
     */
    private function compatible(string $type, array $schema): bool {
        $specType = $schema['type'] ?? (isset($schema['properties']) ? 'object' : null);
        $format = strtolower((string) ($schema['format'] ?? ''));
        $enum = enum_exists($type);
        $scalarValue = class_exists($type) && OpenApiProbe::isScalarValue($type);
        $date = in_array($type, ['DateTime', 'DateTimeImmutable', 'DateTimeInterface'], true);

        if (isset($schema['enum'])) {
            return $type === 'string' || $enum || (in_array($specType, ['integer', 'number'], true) && in_array($type, ['int', 'float'], true));
        }

        return match ($specType) {
            'string' => in_array($format, ['date', 'date-time', 'datetime'], true)
                ? ($date || $type === 'string')
                : ($type === 'string' || $scalarValue || $enum || $date),
            'integer' => in_array($type, ['int', 'float', 'string'], true) || $scalarValue || $enum,
            'number' => in_array($type, ['float', 'string'], true) || $scalarValue || ($type === 'int' && (str_contains($format, 'int') || $format === 'short')),
            'boolean' => $type === 'bool',
            'object' => !isset($schema['properties']) || is_subclass_of($type, NamedEntity::class) || $type === 'array',
            'array' => is_subclass_of($type, NamedValues::class) || $type === 'array',
            default => true,
        };
    }

    /**
     * @return list<string>
     */
    private function missing(mixed $expected, mixed $actual, string $prefix = ''): array {
        if (!is_array($expected)) {
            return [];
        }

        if (array_is_list($expected)) {
            return (isset($expected[0]) && is_array($actual) && isset($actual[0])) ? $this->missing($expected[0], $actual[0], "{$prefix}[]") : [];
        }

        $missing = [];
        foreach ($expected as $name => $value) {
            if (!OpenApiProbe::mappable((string) $name)) {
                continue;
            }
            if (!is_array($actual) || !array_key_exists($name, $actual)) {
                $missing[] = $prefix . $name;
                continue;
            }
            $missing = array_merge($missing, $this->missing($value, $actual[$name], "{$prefix}{$name}."));
        }

        return $missing;
    }

    private static function short(string $class): string {
        return str_replace('Datev\\Entities\\', '', $class);
    }
}
