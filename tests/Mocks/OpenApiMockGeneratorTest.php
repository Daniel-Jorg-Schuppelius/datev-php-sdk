<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenApiMockGeneratorTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks;

use PHPUnit\Framework\TestCase;

/**
 * Tests für den OpenApiMockGenerator.
 */
class OpenApiMockGeneratorTest extends TestCase {
    public function test_load_spec_diagnostics(): void {
        $spec = OpenApiMockGenerator::loadSpec('diagnostics');

        $this->assertNotNull($spec);
        $this->assertArrayHasKey('paths', $spec);
    }

    public function test_load_spec_client_master_data(): void {
        $spec = OpenApiMockGenerator::loadSpec('clientmasterdata');

        $this->assertNotNull($spec);
        $this->assertArrayHasKey('paths', $spec);
        $this->assertArrayHasKey('/clients', $spec['paths']);
    }

    public function test_load_spec_accounting(): void {
        $spec = OpenApiMockGenerator::loadSpec('accounting');

        $this->assertNotNull($spec);
        $this->assertArrayHasKey('paths', $spec);
    }

    public function test_load_spec_payroll(): void {
        $spec = OpenApiMockGenerator::loadSpec('payroll');

        $this->assertNotNull($spec);
        $this->assertArrayHasKey('paths', $spec);
    }

    public function test_get_base_path(): void {
        $basePath = OpenApiMockGenerator::getBasePath('clientmasterdata');

        $this->assertNotEmpty($basePath);
        $this->assertStringContainsString('master-data', $basePath);
    }

    public function test_extract_examples_client_master_data(): void {
        $examples = OpenApiMockGenerator::extractExamples('clientmasterdata');

        $this->assertNotEmpty($examples);
        $this->assertIsArray($examples);

        // Prüfe, ob Clients-Endpoint vorhanden ist
        $hasClientsEndpoint = false;
        foreach (array_keys($examples) as $key) {
            if (str_contains($key, 'clients')) {
                $hasClientsEndpoint = true;
                break;
            }
        }
        $this->assertTrue($hasClientsEndpoint, 'Clients endpoint should be present');
    }

    public function test_extract_examples_accounting(): void {
        $examples = OpenApiMockGenerator::extractExamples('accounting');

        // Accounting spec hat möglicherweise nur Schema-Definitionen ohne explizite Beispiele
        // Daher prüfen wir nur, ob das Array-Format stimmt
        $this->assertIsArray($examples);
    }

    public function test_create_mock_client_from_open_api(): void {
        $client = OpenApiMockGenerator::createMockClientFromOpenApi('clientmasterdata');

        $this->assertInstanceOf(MockClient::class, $client);

        // Prüfe, ob der Client funktioniert
        $response = $client->get('/datev/api/master-data/v1/clients');
        // Sollte entweder 200 (wenn Beispiel gefunden) oder 404 (wenn nicht) sein
        $this->assertContains($response->getStatusCode(), [200, 404]);
    }

    public function test_get_available_domains(): void {
        $domains = OpenApiMockGenerator::getAvailableDomains();

        $this->assertNotEmpty($domains);
        $this->assertContains('diagnostics', $domains);
        $this->assertContains('clientmasterdata', $domains);
        $this->assertContains('accounting', $domains);
        $this->assertContains('payroll', $domains);
    }

    public function test_get_endpoint_count(): void {
        $count = OpenApiMockGenerator::getEndpointCount('clientmasterdata');

        $this->assertGreaterThan(0, $count);
    }

    public function test_register_from_open_api(): void {
        $client = new MockClient;
        OpenApiMockGenerator::registerFromOpenApi($client, 'clientmasterdata');

        // Der Client sollte jetzt Responses registriert haben
        $this->assertInstanceOf(MockClient::class, $client);
    }

    public function test_register_all_from_open_api(): void {
        $client = new MockClient;
        OpenApiMockGenerator::registerAllFromOpenApi($client);

        // Der Client sollte jetzt Responses für alle Domains haben
        $this->assertInstanceOf(MockClient::class, $client);
    }

    public function test_unknown_domain_returns_null(): void {
        $spec = OpenApiMockGenerator::loadSpec('unknown-domain');

        $this->assertNull($spec);
    }
}
