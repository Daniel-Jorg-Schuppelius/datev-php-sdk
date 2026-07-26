<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrFilesEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\HrFiles;

use Datev\API\Online\Endpoints\HrFiles\{ClientsEndpoint, FilesEndpoint, JobsEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\HrFiles\Clients\{Client, Clients};
use Datev\Entities\Online\HrFiles\Jobs\JobInfo;
use Datev\Enums\Online\{HrFileJobState, HrImportFileType, HrTargetSystem};
use Tests\Contracts\OnlineEndpointTest;

class HrFilesEndpointsTest extends OnlineEndpointTest {
    protected function getService(): OnlineService {
        return OnlineService::HrFiles;
    }

    public function test_search_clients(): void {
        $this->registerMockResponse('GET', 'v1/clients', 200, [
            ['client_id' => '1234567-12345', 'consultant_number' => 1234567, 'client_number' => 12345],
        ]);

        $endpoint = new ClientsEndpoint($this->client);
        $clients = $endpoint->search();

        $this->assertInstanceOf(Clients::class, $clients);

        if ($this->isUsingMock()) {
            $client = $clients->getFirstValue();
            $this->assertInstanceOf(Client::class, $client);
            $this->assertSame('1234567-12345', $client->getClientId());
            $this->assertSame('1234567-12345', $client->getConsultantClientNumber()?->toString());
        }
    }

    public function test_get_client_permission_check(): void {
        $this->registerMockResponse('GET', 'v1/clients/1234567-12345', 200, [
            'client_id' => '1234567-12345', 'consultant_number' => 1234567, 'client_number' => 12345,
        ]);

        $endpoint = new ClientsEndpoint($this->client);
        $client = $endpoint->get('1234567-12345');

        $this->assertInstanceOf(Client::class, $client);
    }

    public function test_upload_file(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'v1/clients/1234567-12345/files', 201, [
            'job_id' => 'abc12345-abcd-abcd-1233-12345aedgf55',
            'timestamp' => '2026-07-03T10:40:52+02:00',
            'state' => 'uploaded',
        ]);

        $endpoint = new FilesEndpoint($this->client, '1234567-12345');
        $jobInfo = $endpoint->upload(
            'file-content',
            'lohndaten.txt',
            'Company XY',
            HrImportFileType::MovementData,
            '2026-07-01T10:40:52.000+02:00',
            HrTargetSystem::Lodas,
            '2026-06-30'
        );

        $this->assertInstanceOf(JobInfo::class, $jobInfo);
        $this->assertSame(HrFileJobState::Uploaded, $jobInfo->getState());
        $this->assertSame('abc12345-abcd-abcd-1233-12345aedgf55', $jobInfo->getJobId());

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertIsArray($lastRequest['options']);
        $this->assertIsArray($lastRequest['options']['multipart']);
        $multipartNames = array_column($lastRequest['options']['multipart'], 'name');
        $this->assertContains('file', $multipartNames);
        $this->assertContains('import_file_type', $multipartNames);
        $this->assertContains('target_system', $multipartNames);
    }

    public function test_get_job_state(): void {
        $this->registerMockResponse('GET', 'v1/clients/1234567-12345/jobs/abc12345-abcd-abcd-1233-12345aedgf55', 200, [
            'job_id' => 'abc12345-abcd-abcd-1233-12345aedgf55',
            'timestamp' => '2026-07-03T10:40:52+02:00',
            'state' => 'imported',
        ]);

        $endpoint = new JobsEndpoint($this->client, '1234567-12345');
        $jobInfo = $endpoint->get('abc12345-abcd-abcd-1233-12345aedgf55');

        $this->assertInstanceOf(JobInfo::class, $jobInfo);

        if ($this->isUsingMock()) {
            $this->assertSame(HrFileJobState::Imported, $jobInfo->getState());
        }
    }
}
