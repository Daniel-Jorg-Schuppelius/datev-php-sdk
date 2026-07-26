<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DxsoJobsEndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\AccountingDxsoJobs;

use Datev\API\Online\Endpoints\AccountingDxsoJobs\DxsoJobsEndpoint;
use Datev\API\Online\OnlineService;
use Datev\API\Online\Support\JobPoller;
use Datev\Entities\Online\AccountingDxsoJobs\Jobs\{DxsoJob, DxsoJobStatus};
use Datev\Entities\Online\AccountingDxsoJobs\ProtocolEntries\ProtocolEntries;
use Datev\Enums\Online\{DxsoImportType, DxsoJobStatusCode};
use Tests\Contracts\OnlineEndpointTest;

class DxsoJobsEndpointTest extends OnlineEndpointTest {
    private const CLIENT_ID = '29098-55003';

    private const JOB_ID = '550e8400-e29b-41d4-a716-446655440000';

    protected function getService(): OnlineService {
        return OnlineService::AccountingDxsoJobs;
    }

    private function createEndpoint(): DxsoJobsEndpoint {
        return new DxsoJobsEndpoint($this->client, self::CLIENT_ID);
    }

    public function test_create_job(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/dxso-jobs', 201, [
            'id' => self::JOB_ID,
            'account_length' => 4,
            'cash_ledger_names' => ['Kasse 1'],
            'ledger_folder_names' => ['Rechnungseingang'],
        ]);

        $job = $this->createEndpoint()->create(DxsoImportType::CashLedgerImport, '2026-06');

        $this->assertInstanceOf(DxsoJob::class, $job);
        $this->assertSame(self::JOB_ID, $job->getId());
        $this->assertSame(['Kasse 1'], $job->getCashLedgerNames());

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame(['import_type' => 'cashLedgerImport', 'accounting_month' => '2026-06'], $lastRequest['options']['json']);
    }

    public function test_get_status(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/dxso-jobs/' . self::JOB_ID, 200, [
            'id' => self::JOB_ID,
            'status' => 2,
        ]);

        $status = $this->createEndpoint()->get(self::JOB_ID);

        $this->assertInstanceOf(DxsoJobStatus::class, $status);

        if ($this->isUsingMock()) {
            $this->assertSame(DxsoJobStatusCode::Succeeded, $status->getStatus());
            $this->assertTrue($status->getStatus()->isTerminal());
        }
    }

    public function test_add_file_and_finalize(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/dxso-jobs/' . self::JOB_ID . '/files', 201);
        $this->registerMockResponse('PUT', 'clients/' . self::CLIENT_ID . '/dxso-jobs/' . self::JOB_ID, 204);

        $endpoint = $this->createEndpoint();
        $endpoint->addFile(self::JOB_ID, 'xml-content', 'transfer.xml');
        $endpoint->finalize(self::JOB_ID);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();

        $fileRequest = $requests[count($requests) - 2];
        $this->assertSame('POST', $fileRequest['method']);
        $this->assertSame('files', $fileRequest['options']['multipart'][0]['name']);

        $finalizeRequest = end($requests);
        $this->assertNotFalse($finalizeRequest);
        $this->assertSame('PUT', $finalizeRequest['method']);
        $this->assertSame('application/merge-patch+json', $finalizeRequest['options']['headers']['Content-Type'] ?? null);
        $this->assertSame('{"ready":"true"}', $finalizeRequest['options']['body']);
    }

    public function test_cancel_job(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('DELETE', 'clients/' . self::CLIENT_ID . '/dxso-jobs/' . self::JOB_ID, 204);

        $this->createEndpoint()->cancel(self::JOB_ID);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame('DELETE', $lastRequest['method']);
    }

    public function test_get_protocol_entries(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/dxso-jobs/' . self::JOB_ID . '/protocol-entries', 200, [
            ['time' => '2026-07-03T10:00:00', 'text' => 'OK', 'context' => 'import', 'type' => 'info', 'filename' => 'transfer.xml'],
        ]);

        $entries = $this->createEndpoint()->getProtocolEntries(self::JOB_ID);

        $this->assertInstanceOf(ProtocolEntries::class, $entries);

        if ($this->isUsingMock()) {
            $firstEntry = $entries->getFirstValue();
            $this->assertNotNull($firstEntry);
            $this->assertSame('OK', $firstEntry->getText());
        }
    }

    public function test_wait_for_completion(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/dxso-jobs/' . self::JOB_ID, 200, [
            'id' => self::JOB_ID,
            'status' => 4,
        ]);

        $status = $this->createEndpoint()->waitForCompletion(self::JOB_ID, new JobPoller(5, 1));

        $this->assertInstanceOf(DxsoJobStatus::class, $status);
        $this->assertSame(DxsoJobStatusCode::PartiallyProcessed, $status->getStatus());
    }
}
