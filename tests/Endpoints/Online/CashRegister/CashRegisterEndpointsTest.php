<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CashRegisterEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\CashRegister;

use Datev\API\Online\Endpoints\CashRegister\{FilesEndpoint, ReportsEndpoint, TenantsEndpoint, TseLogsEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\CashRegister\Tenants\{Tenant, Tenants};
use Datev\Entities\Online\CashRegister\TseLogs\TseLogInfo;
use Tests\Contracts\OnlineEndpointTest;

class CashRegisterEndpointsTest extends OnlineEndpointTest {
    protected function getService(): OnlineService {
        return OnlineService::CashRegister;
    }

    public function test_search_tenants(): void {
        $this->registerMockResponse('GET', 'tenants', 200, [
            ['id' => 'tenant-1', 'name' => 'Hauptkasse'],
            ['id' => 'tenant-2', 'name' => 'Filiale'],
        ]);

        $endpoint = new TenantsEndpoint($this->client);
        $tenants = $endpoint->search();

        $this->assertInstanceOf(Tenants::class, $tenants);

        if ($this->isUsingMock()) {
            $this->assertSame(2, $tenants->count());
            $tenant = $tenants->getFirstValue();
            $this->assertInstanceOf(Tenant::class, $tenant);
            $this->assertSame('tenant-1', $tenant->getId());
        }
    }

    public function test_create_report_against_mock(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'tenants/tenant-1/reports', 204);

        $endpoint = new ReportsEndpoint($this->client, 'tenant-1');
        $endpoint->create(['record_keeping_systems_notification' => ['locations' => []]], 'req-123');

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame('POST', $lastRequest['method']);
        $this->assertSame('tenants/tenant-1/reports', $lastRequest['uri']);
        $this->assertSame('req-123', $lastRequest['options']['headers']['Request-Id'] ?? null);
    }

    public function test_import_file(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'tenants/tenant-1/files/import', 202);

        $endpoint = new FilesEndpoint($this->client, 'tenant-1');
        $endpoint->import('tar-file-content', 'archive.tar', ['cash_register' => []]);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame('POST', $lastRequest['method']);
        $this->assertSame('tenants/tenant-1/files/import', $lastRequest['uri']);
        $this->assertArrayHasKey('multipart', $lastRequest['options']);
        $this->assertCount(2, $lastRequest['options']['multipart']);
    }

    public function test_get_tselog_info(): void {
        $this->registerMockResponse('GET', 'tenants/tenant-1/tselogs/SN-123', 200, [
            'serial_number' => 'SN-123',
            'max_signature_counter' => 4711,
            'custom_field' => 'Kasse 1',
        ]);

        $endpoint = new TseLogsEndpoint($this->client, 'tenant-1');
        $info = $endpoint->get('SN-123');

        $this->assertInstanceOf(TseLogInfo::class, $info);

        if ($this->isUsingMock()) {
            $this->assertSame('SN-123', $info->getSerialNumber());
            $this->assertSame(4711, $info->getMaxSignatureCounter());
            $this->assertSame('Kasse 1', $info->getCustomField());
        }
    }
}
