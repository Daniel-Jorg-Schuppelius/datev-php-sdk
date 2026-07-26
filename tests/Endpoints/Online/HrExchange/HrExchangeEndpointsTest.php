<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrExchangeEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\HrExchange;

use Datev\API\Online\Endpoints\HrExchange\{
    AbsencesEndpoint,
    ClientsEndpoint,
    EmployeesEndpoint,
    EmploymentPeriodsEndpoint,
    GrossPaymentsEndpoint,
    HourlyWagesEndpoint,
    JobsEndpoint,
    MonthRecordsEndpoint,
    RestHooksEndpoint
};
use Datev\API\Online\OnlineService;
use Datev\API\Online\Support\JobPoller;
use Datev\Entities\Online\HrExchange\Jobs\{Job, JobResult};
use Datev\Entities\Online\HrExchange\RestHooks\{RestHook, RestHooks};
use Datev\Enums\Online\HrTargetSystem;
use Tests\Contracts\OnlineEndpointTest;

class HrExchangeEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_ID = 'f81d4fae-7dec-11d0-a765-00a0c91e6bf6';

    private const PN = '77';

    private const JOB_UUID = 'aaaa1111-2222-3333-4444-555566667777';

    protected function getService(): OnlineService {
        return OnlineService::HrExchange;
    }

    private function employeeBase(): string {
        return 'clients/' . self::CLIENT_ID . '/employees/' . self::PN;
    }

    public function test_check_access(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID, 200, null);

        $endpoint = new ClientsEndpoint($this->client, self::CLIENT_ID);
        $this->assertTrue($endpoint->checkAccess());
    }

    public function test_employee_writes_return_job(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $jobBody = ['id' => self::JOB_UUID, 'state' => 'accepted', 'time_stamp' => '2026-07-03T10:00:00Z'];
        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/employees', 202, $jobBody);
        $this->registerMockResponse('PUT', $this->employeeBase(), 202, $jobBody);

        $endpoint = new EmployeesEndpoint($this->client, self::CLIENT_ID);

        $job = $endpoint->create(['surname' => 'Mustermann', 'first_name' => 'Max']);
        $this->assertInstanceOf(Job::class, $job);
        $this->assertSame('accepted', $job->getState());

        $job = $endpoint->updateOne(self::PN, ['surname' => 'Musterfrau']);
        $this->assertSame(self::JOB_UUID, $job?->getId());

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame(['surname' => 'Musterfrau'], $lastRequest['options']['json']);
    }

    public function test_absences_lug_and_lodas(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $jobBody = ['id' => self::JOB_UUID, 'state' => 'accepted'];
        $this->registerMockResponse('POST', $this->employeeBase() . '/absences/lug', 202, $jobBody);
        $this->registerMockResponse('DELETE', $this->employeeBase() . '/absences/lug/abs-1', 202, $jobBody);
        $this->registerMockResponse('POST', $this->employeeBase() . '/absences/lodas', 202, $jobBody);
        $this->registerMockResponse('DELETE', $this->employeeBase() . '/absences/lodas/2026-07-01', 202, $jobBody);

        $endpoint = new AbsencesEndpoint($this->client, self::CLIENT_ID, self::PN);

        $this->assertInstanceOf(Job::class, $endpoint->createLug(['personnel_number' => 77, 'date_of_emergence' => '2026-07-01', 'reason_for_absence' => 'krank']));
        $this->assertInstanceOf(Job::class, $endpoint->deleteLug('abs-1'));
        $this->assertInstanceOf(Job::class, $endpoint->createLodas(['personnel_number' => 77, 'absence_start_date' => '2026-07-01', 'reason_for_absence' => 1]));
        $this->assertInstanceOf(Job::class, $endpoint->deleteLodas('2026-07-01'));
    }

    public function test_employment_periods_gross_payments_hourly_wages_month_records(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $jobBody = ['id' => self::JOB_UUID, 'state' => 'accepted'];
        $this->registerMockResponse('POST', $this->employeeBase() . '/employment-periods', 202, $jobBody);
        $this->registerMockResponse('PUT', $this->employeeBase() . '/employment-periods/2020-01-01', 202, $jobBody);
        $this->registerMockResponse('DELETE', $this->employeeBase() . '/employment-periods/2020-01-01', 202, $jobBody);
        $this->registerMockResponse('PUT', $this->employeeBase() . '/gross-payments/1', 202, $jobBody);
        $this->registerMockResponse('POST', $this->employeeBase() . '/hourly-wages', 202, $jobBody);
        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/month-records', 202, $jobBody);
        $this->registerMockResponse('POST', $this->employeeBase() . '/month-records', 202, $jobBody);

        $periods = new EmploymentPeriodsEndpoint($this->client, self::CLIENT_ID, self::PN);
        $this->assertInstanceOf(Job::class, $periods->create(['date_of_commencement_of_employment' => '2020-01-01']));
        $this->assertInstanceOf(Job::class, $periods->update('2020-01-01', ['date_of_termination_of_employment' => '2026-12-31']));
        $this->assertInstanceOf(Job::class, $periods->delete('2020-01-01'));

        $gross = new GrossPaymentsEndpoint($this->client, self::CLIENT_ID, self::PN);
        $this->assertInstanceOf(Job::class, $gross->updateById(1, ['amount' => 4500.0]));

        $wages = new HourlyWagesEndpoint($this->client, self::CLIENT_ID, self::PN);
        $this->assertInstanceOf(Job::class, $wages->create(['amount' => 25.0]));

        $records = new MonthRecordsEndpoint($this->client, self::CLIENT_ID);
        $this->assertInstanceOf(Job::class, $records->createForClient(['personnel_number' => 77, 'value' => 160.0]));
        $this->assertInstanceOf(Job::class, $records->createForEmployee(self::PN, ['value' => 160.0]));
    }

    public function test_read_job_flow(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/jobs', 202, ['id' => self::JOB_UUID, 'state' => 'accepted']);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/jobs/' . self::JOB_UUID, 200, ['id' => self::JOB_UUID, 'state' => 'finished']);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/jobs/' . self::JOB_UUID . '/result/employees', 200, [
            'httpStatus' => '200',
            'exchangeObjects' => [['surname' => 'Mustermann', 'personnel_number' => 77]],
            'errors' => [],
        ]);

        $endpoint = new JobsEndpoint($this->client, self::CLIENT_ID);

        $job = $endpoint->create(['resourceType' => 'employees', 'reference_date' => '2026-07-01'], HrTargetSystem::Lodas, 'https://callback.example/hook', 'Bearer token');
        $this->assertInstanceOf(Job::class, $job);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $createRequest = end($requests);
        $this->assertSame('lodas', $createRequest['options']['headers']['Target-System'] ?? null);
        $this->assertSame('https://callback.example/hook', $createRequest['options']['headers']['Notify-Url'] ?? null);

        $finished = $endpoint->waitForJob(self::JOB_UUID, ['finished', 'failed'], new JobPoller(5, 1));
        $this->assertSame('finished', $finished?->getState());

        $result = $endpoint->getResultEmployees(self::JOB_UUID);
        $this->assertInstanceOf(JobResult::class, $result);
        $this->assertSame('Mustermann', $result->getExchangeObjects()[0]['surname'] ?? null);
    }

    public function test_resthooks_crud(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $hookBody = ['client_url' => 'https://callback.example/hook', 'time_stamp' => '2026-07-03T10:00:00Z'];
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/resthooks', 200, [$hookBody]);
        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/resthooks', 201);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/resthooks/' . self::JOB_UUID, 200, $hookBody);
        $this->registerMockResponse('PUT', 'clients/' . self::CLIENT_ID . '/resthooks/' . self::JOB_UUID, 200);
        $this->registerMockResponse('DELETE', 'clients/' . self::CLIENT_ID . '/resthooks/' . self::JOB_UUID, 204);
        $this->registerMockResponse('POST', 'clients/' . self::CLIENT_ID . '/resthooks/' . self::JOB_UUID . '/test', 202);

        $endpoint = new RestHooksEndpoint($this->client, self::CLIENT_ID);

        $this->assertInstanceOf(RestHooks::class, $endpoint->search());
        $endpoint->create(['client_url' => 'https://callback.example/hook']);
        $this->assertInstanceOf(RestHook::class, $endpoint->get(self::JOB_UUID));
        $endpoint->update(self::JOB_UUID, ['client_url' => 'https://callback.example/hook2']);
        $endpoint->test(self::JOB_UUID);
        $endpoint->delete(self::JOB_UUID);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame('DELETE', $lastRequest['method']);
    }
}
