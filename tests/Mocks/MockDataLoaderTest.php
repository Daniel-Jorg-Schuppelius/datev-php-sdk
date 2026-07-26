<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MockDataLoaderTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks;

use PHPUnit\Framework\TestCase;
use Tests\Mocks\Fixtures\{AccountingFixtures, ClientMasterDataFixtures, DiagnosticsFixtures, PayrollFixtures};

/**
 * Tests für den MockDataLoader.
 */
class MockDataLoaderTest extends TestCase {
    public function test_create_fully_configured_mock_client(): void {
        $client = MockDataLoader::createFullyConfiguredMockClient();

        $this->assertInstanceOf(MockClient::class, $client);

        // Prüfe, ob Echo-Endpoint funktioniert (vollständiger Pfad aus OpenAPI)
        $response = $client->get('/datev/api/diagnostics/v1/echo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_create_mock_client_for_domain_diagnostics(): void {
        $client = MockDataLoader::createMockClientForDomain('diagnostics');

        $response = $client->get('/datev/api/diagnostics/v1/echo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_create_mock_client_for_domain_accounting(): void {
        $client = MockDataLoader::createMockClientForDomain('accounting');

        // Diagnostics sollte auch verfügbar sein
        $echoResponse = $client->get('/datev/api/diagnostics/v1/echo');
        $this->assertEquals(200, $echoResponse->getStatusCode());

        // Accounting Clients sollten verfügbar sein
        $clientsResponse = $client->get('/datev/api/accounting/v1/clients');
        $this->assertEquals(200, $clientsResponse->getStatusCode());
    }

    public function test_create_mock_client_for_domain_client_master_data(): void {
        $client = MockDataLoader::createMockClientForDomain('clientmasterdata');

        $response = $client->get('/datev/api/master-data/v1/clients');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_create_mock_client_for_domain_payroll(): void {
        $client = MockDataLoader::createMockClientForDomain('payroll');

        $response = $client->get('/datev/api/hr/v3/clients');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_create_mock_client_for_domain_hr(): void {
        $client = MockDataLoader::createMockClientForDomain('hr');

        $response = $client->get('/datev/api/hr/v3/clients');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_diagnostics_fixtures(): void {
        $echo = DiagnosticsFixtures::getEcho();

        $this->assertArrayHasKey('id', $echo);
        $this->assertArrayHasKey('echo_message', $echo);
        $this->assertStringContainsString('echo-', $echo['id']);
    }

    public function test_accounting_fixtures(): void {
        $clients = AccountingFixtures::getClients();

        $this->assertNotEmpty($clients);
        $this->assertArrayHasKey('consultant_number', $clients[0]);
    }

    public function test_client_master_data_fixtures(): void {
        $addressees = ClientMasterDataFixtures::getAddressees();

        $this->assertNotEmpty($addressees);
    }

    public function test_payroll_fixtures(): void {
        $employees = PayrollFixtures::getEmployees();

        $this->assertNotEmpty($employees);
        $this->assertArrayHasKey('content', $employees);
        $this->assertArrayHasKey('first_name', $employees['content'][0]);
    }

    public function test_register_all_fixtures(): void {
        $client = new MockClient;
        MockDataLoader::registerAllFixtures($client);

        // Alle Domains sollten verfügbar sein
        $this->assertEquals(200, $client->get('/datev/api/diagnostics/v1/echo')->getStatusCode());
        $this->assertEquals(200, $client->get('/datev/api/accounting/v1/clients')->getStatusCode());
        $this->assertEquals(200, $client->get('/datev/api/master-data/v1/clients')->getStatusCode());
        $this->assertEquals(200, $client->get('/datev/api/hr/v3/clients')->getStatusCode());
    }
}
