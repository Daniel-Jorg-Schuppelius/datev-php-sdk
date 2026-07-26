<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExtfFilesEndpointTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\AccountingExtfFiles;

use Datev\API\Online\Endpoints\AccountingExtfFiles\ExtfFilesEndpoint;
use Datev\API\Online\OnlineService;
use Datev\API\Online\Support\{JobLocation, JobPoller};
use Datev\Entities\Online\AccountingExtfFiles\Jobs\ExtfJob;
use Datev\Enums\Online\ExtfJobResult;
use Tests\Contracts\OnlineEndpointTest;

class ExtfFilesEndpointTest extends OnlineEndpointTest {
    private const CLIENT_ID = '29098-100';

    private const JOB_ID = 'f81d4fae-7dec-11d0-a765-00a0c91e6bf6';

    protected function getService(): OnlineService {
        return OnlineService::AccountingExtfFiles;
    }

    private function createEndpoint(): ExtfFilesEndpoint {
        return new ExtfFilesEndpoint($this->client, self::CLIENT_ID);
    }

    public function test_import_returns_job_location(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/extf-files/import', 202, null, [
            'Location' => 'clients/' . self::CLIENT_ID . '/extf-files/jobs/' . self::JOB_ID,
            'Retry-After' => '0',
        ]);

        $jobLocation = $this->createEndpoint()->import('EXTF;700;21;...', 'EXTF_Buchungsstapel.csv', 'ref-1', '1.0.0');

        $this->assertInstanceOf(JobLocation::class, $jobLocation);
        $this->assertSame(self::JOB_ID, $jobLocation->getJobId());
        $this->assertSame(0, $jobLocation->retryAfter);

        $this->assertNotNull($this->mockClient);
        $requests = $this->mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertSame('EXTF_Buchungsstapel.csv', $lastRequest['options']['headers']['Filename'] ?? null);
        $this->assertSame('ref-1', $lastRequest['options']['headers']['Reference-Id'] ?? null);
        $this->assertSame('application/octet-stream', $lastRequest['options']['headers']['Content-Type'] ?? null);
    }

    public function test_search_jobs_with_paging(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/extf-files/jobs?skip=0&top=10', 200, [
            ['id' => self::JOB_ID, 'filename' => 'EXTF_Buchungsstapel.csv', 'result' => 'succeeded', 'timestamp' => '2026-07-03T10:00:00Z'],
        ], [
            'Content-Type' => 'application/json;charset=utf-8',
            'Total-Items' => '42',
            'Link' => '<clients/' . self::CLIENT_ID . '/extf-files/jobs?skip=10&top=10>; rel="next"',
        ]);

        $page = $this->createEndpoint()->searchJobs(['skip' => 0, 'top' => 10]);

        // Total-Items ist die Trefferanzahl aus dem Header (?int), kein Betrag.
        $this->assertSame(42, $page->getTotalItems());
        $this->assertTrue($page->hasNext());
        $this->assertSame(1, $page->getItems()?->count());
        $this->assertInstanceOf(ExtfJob::class, $page->getItems()->getFirstValue());
    }

    public function test_get_job(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/extf-files/jobs/' . self::JOB_ID, 200, [
            'id' => self::JOB_ID,
            'filename' => 'EXTF_Buchungsstapel.csv',
            'result' => 'failed',
            'number_of_accounting_records' => 0,
            'validation_details' => [
                'type' => 'validation-error',
                'title' => 'Invalid file',
                'detail' => 'Header invalid',
                'affected_elements' => [['name' => 'header', 'reason' => 'missing']],
            ],
        ]);

        $job = $this->createEndpoint()->get(self::JOB_ID);

        $this->assertInstanceOf(ExtfJob::class, $job);

        if ($this->isUsingMock()) {
            $this->assertSame(ExtfJobResult::Failed, $job->getResult());
            $this->assertSame('missing', $job->getValidationDetails()?->getAffectedElements()?->getFirstValue()?->getReason());
        }
    }

    public function test_wait_for_import(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/extf-files/jobs/' . self::JOB_ID, 200, [
            'id' => self::JOB_ID,
            'filename' => 'EXTF_Buchungsstapel.csv',
            'result' => 'succeeded',
        ]);

        $jobLocation = new JobLocation('clients/' . self::CLIENT_ID . '/extf-files/jobs/' . self::JOB_ID, 0);
        $job = $this->createEndpoint()->waitForImport($jobLocation, new JobPoller(5, 1));

        $this->assertInstanceOf(ExtfJob::class, $job);
        $this->assertSame(ExtfJobResult::Succeeded, $job->getResult());
    }
}
