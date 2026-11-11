<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiSchemaCoverageTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities;

use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use DateTimeImmutable;
use Datev\Entities\Accounting\AccountPostings\AccountPosting;
use Datev\Entities\Accounting\AccountsPayable\AccountPayable;
use Datev\Entities\Accounting\AccountsReceivable\AccountReceivable;
use Datev\Entities\Accounting\OpenItems\OpenItem;
use Datev\Entities\Accounting\RecordReads\RecordRead;
use Datev\Entities\DocumentManagement\StructureItems\StructureItem;
use Datev\Entities\DocumentManagement\StructureItems\Updates\StructureItemUpdate;
use Datev\Entities\Payroll\Employees\Employee;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;
use Throwable;

/**
 * Baut aus einem Schema der OpenAPI-Datei ein Beispielobjekt, liest es mit der
 * Entität ein und verlangt, dass jedes Feld unverändert aus toArray() zurückkommt.
 * Fängt verworfene Felder, falsch geschriebene Feldnamen und verschachtelt
 * ausgegebene IDs.
 */
final class OpenApiSchemaCoverageTest extends TestCase {
    /**
     * @return array<string, array{0: string, 1: string, 2: class-string<NamedEntityInterface>}>
     */
    public static function schemas(): array {
        return [
            'accounts-receivable' => ['Accounting-1.7.4.1.json', 'schema_accounts-receivable', AccountReceivable::class],
            'accounts-payable' => ['Accounting-1.7.4.1.json', 'schema_accounts-payable', AccountPayable::class],
            'open-item' => ['Accounting-1.7.4.1.json', 'schema_datev.open-item', OpenItem::class],
            'account-postings' => ['Accounting-1.7.4.1.json', 'schema_account-postings', AccountPosting::class],
            'accounting-record-read' => ['Accounting-1.7.4.1.json', 'schema_accounting-record-read', RecordRead::class],
            'structure-item' => ['document management-2.3.1.json', 'StructureItem', StructureItem::class],
            'structure-item-update' => ['document management-2.3.1.json', 'StructureItemUpdate', StructureItemUpdate::class],
            'payroll-employee' => ['Payroll-3.1.1.json', 'Employee', Employee::class],
        ];
    }

    /**
     * @param class-string<NamedEntityInterface> $entityClass
     */
    #[DataProvider('schemas')]
    public function test_entity_keeps_every_schema_field(string $specFile, string $schema, string $entityClass): void {
        $spec = json_decode((string) file_get_contents(dirname(__DIR__, 2) . "/docs/OpenAPI/Desktop/{$specFile}"), true);
        $this->assertIsArray($spec);

        $prefix = isset($spec['components']) ? '#/components/schemas/' : '#/definitions/';
        $example = $this->example($spec, ['$ref' => $prefix . $schema]);
        $this->assertIsArray($example);

        $result = $entityClass::fromJson((string) json_encode($example))->toArray();

        $missing = array_keys(array_diff_key($example, $result));
        $this->assertSame([], $missing, "{$entityClass} verwirft Felder aus {$schema}.");

        foreach ($example as $field => $expected) {
            $this->assertTrue(
                $this->same($expected, $result[$field]),
                "{$entityClass}::{$field}: erwartet " . json_encode($expected) . ', erhalten ' . json_encode($result[$field])
            );
        }
    }

    /**
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $schema
     */
    private function example(array $spec, array $schema, int $depth = 0): mixed {
        $schema = $this->resolve($spec, $schema);
        $type = $schema['type'] ?? (isset($schema['properties']) ? 'object' : 'string');

        if (isset($schema['enum'])) {
            return $schema['enum'][0];
        }

        if ($type === 'object') {
            if ($depth > 2) {
                return new stdClass;
            }

            $object = [];
            foreach ($schema['properties'] ?? [] as $name => $property) {
                $object[$name] = $this->example($spec, $property, $depth + 1);
            }

            return $object;
        }

        if ($type === 'array') {
            return [$this->example($spec, $schema['items'] ?? [], $depth + 1)];
        }

        if (array_key_exists('example', $schema)) {
            return $schema['example'];
        }

        return match ($type) {
            'integer' => 7,
            'number' => 1.5,
            'boolean' => true,
            default => match ($schema['format'] ?? '') {
                'date-time' => '2024-01-01T00:00:00+01:00',
                'date' => '2024-01-01',
                default => 'x',
            },
        };
    }

    /**
     * @param array<string, mixed> $spec
     * @param array<string, mixed> $schema
     * @return array<string, mixed>
     */
    private function resolve(array $spec, array $schema): array {
        while (isset($schema['$ref'])) {
            $node = $spec;
            foreach (explode('/', substr($schema['$ref'], 2)) as $segment) {
                $node = $node[$segment];
            }
            $schema = $node;
        }

        if (isset($schema['allOf'])) {
            $merged = ['type' => 'object', 'properties' => []];
            foreach ($schema['allOf'] as $part) {
                $merged['properties'] += $this->resolve($spec, $part)['properties'] ?? [];
            }

            return $merged;
        }

        return $schema;
    }

    private function same(mixed $expected, mixed $actual): bool {
        if (is_array($expected)) {
            return is_array($actual) && count($expected) === count($actual);
        }

        if (is_string($expected) && is_string($actual) && preg_match('/^\d{4}-\d{2}-\d{2}/', $expected) === 1) {
            try {
                // Das Toolkit gibt Zeitpunkte auf Millisekunden aus.
                return (new DateTimeImmutable($expected))->format('Y-m-d\TH:i:s.vP') === (new DateTimeImmutable($actual))->format('Y-m-d\TH:i:s.vP');
            } catch (Throwable) {
                return false;
            }
        }

        return $expected == $actual;
    }
}
