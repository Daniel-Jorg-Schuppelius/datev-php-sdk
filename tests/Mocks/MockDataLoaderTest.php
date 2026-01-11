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
use Tests\Mocks\Fixtures\AccountingFixtures;
use Tests\Mocks\Fixtures\ClientMasterDataFixtures;
use Tests\Mocks\Fixtures\DiagnosticsFixtures;
use Tests\Mocks\Fixtures\PayrollFixtures;

/**
 * Tests für den MockDataLoader.
 */
class MockDataLoaderTest extends TestCase {
    public function testCreateFullyConfiguredMockClient(): void {
        $client = MockDataLoader::createFullyConfiguredMockClient();

        $this->assertInstanceOf(MockClient::class, $client);

        // Prüfe, ob Echo-Endpoint funktioniert (vollständiger Pfad aus OpenAPI)
        $response = $client->get('/datev/api/diagnostics/v1/echo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateMockClientForDomainDiagnostics(): void {
        $client = MockDataLoader::createMockClientForDomain('diagnostics');

        $response = $client->get('/datev/api/diagnostics/v1/echo');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateMockClientForDomainAccounting(): void {
        $client = MockDataLoader::createMockClientForDomain('accounting');

        // Diagnostics sollte auch verfügbar sein
        $echoResponse = $client->get('/datev/api/diagnostics/v1/echo');
        $this->assertEquals(200, $echoResponse->getStatusCode());

        // Accounting Clients sollten verfügbar sein
        $clientsResponse = $client->get('/datev/api/accounting/v1/clients');
        $this->assertEquals(200, $clientsResponse->getStatusCode());
    }

    public function testCreateMockClientForDomainClientMasterData(): void {
        $client = MockDataLoader::createMockClientForDomain('clientmasterdata');

        $response = $client->get('/datev/api/master-data/v1/clients');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateMockClientForDomainPayroll(): void {
        $client = MockDataLoader::createMockClientForDomain('payroll');

        $response = $client->get('/datev/api/hr/v3/clients');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateMockClientForDomainHr(): void {
        $client = MockDataLoader::createMockClientForDomain('hr');

        $response = $client->get('/datev/api/hr/v3/clients');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDiagnosticsFixtures(): void {
        $echo = DiagnosticsFixtures::getEcho();

        $this->assertArrayHasKey('id', $echo);
        $this->assertArrayHasKey('echo_message', $echo);
        $this->assertStringContainsString('echo-', $echo['id']);
    }

    public function testAccountingFixtures(): void {
        $clients = AccountingFixtures::getClients();

        $this->assertIsArray($clients);
        $this->assertNotEmpty($clients);
        $this->assertArrayHasKey('consultant_number', $clients[0]);
    }

    public function testClientMasterDataFixtures(): void {
        $addressees = ClientMasterDataFixtures::getAddressees();

        $this->assertIsArray($addressees);
        $this->assertNotEmpty($addressees);
    }

    public function testPayrollFixtures(): void {
        $employees = PayrollFixtures::getEmployees();

        $this->assertIsArray($employees);
        $this->assertNotEmpty($employees);
        $this->assertArrayHasKey('content', $employees);
        $this->assertArrayHasKey('first_name', $employees['content'][0]);
    }

    public function testRegisterAllFixtures(): void {
        $client = new MockClient();
        MockDataLoader::registerAllFixtures($client);

        // Alle Domains sollten verfügbar sein
        $this->assertEquals(200, $client->get('/datev/api/diagnostics/v1/echo')->getStatusCode());
        $this->assertEquals(200, $client->get('/datev/api/accounting/v1/clients')->getStatusCode());
        $this->assertEquals(200, $client->get('/datev/api/master-data/v1/clients')->getStatusCode());
        $this->assertEquals(200, $client->get('/datev/api/hr/v3/clients')->getStatusCode());
    }
}
