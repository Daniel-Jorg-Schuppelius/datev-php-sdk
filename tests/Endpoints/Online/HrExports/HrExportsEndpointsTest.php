<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrExportsEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\HrExports;

use Datev\API\Online\Endpoints\HrExports\{ClientExportsEndpoint, ClientsEndpoint, EmployeeExportsEndpoint, EmployeeIdsEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\HrExports\Clients\Clients;
use Datev\Entities\Online\HrExports\MasterData\MasterData;
use Datev\Entities\Online\HrExports\SalaryPayments\SalaryPayments;
use Datev\Entities\Online\HrExports\TaxPayments\{TaxPayments, TaxPaymentsList};
use Tests\Contracts\OnlineEndpointTest;

class HrExportsEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_ID = '1234567-12345';

    private const EMPLOYEE_ID = '7';

    protected function getService(): OnlineService {
        return OnlineService::HrExports;
    }

    public function test_search_clients_and_check_access(): void {
        $this->registerMockResponse('GET', 'clients', 200, [
            ['client_id' => self::CLIENT_ID, 'consultant_number' => 1234567, 'client_number' => 12345],
        ]);
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID, 200, null);

        $endpoint = new ClientsEndpoint($this->client);

        $this->assertInstanceOf(Clients::class, $endpoint->search());
        $this->assertTrue($endpoint->checkAccess(self::CLIENT_ID));
    }

    public function test_employee_exports(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $base = 'clients/' . self::CLIENT_ID . '/employees/' . self::EMPLOYEE_ID;

        $this->registerMockResponse('GET', $base . '/taxpayments', 200, [
            'personnel_number' => 7, 'accounting_month' => '2026-06', 'wage_tax' => 512.5,
        ]);
        $this->registerMockResponse('GET', $base . '/salarypayments', 200, [
            'personnel_number' => 7,
            'gross_payments_lodas' => [['wage_type_name' => 'Gehalt', 'wage_type_amount' => 4200.0, 'component_gross_payment' => true]],
            'net_payments' => [['net_payment_name' => 'VWL', 'net_payment_amount' => 40.0]],
        ]);
        $this->registerMockResponse('GET', $base . '/masterdata', 200, [
            'personnel_number' => 7,
            'personal_data' => ['first_name' => 'Max', 'surname' => 'Mustermann', 'address' => ['city' => 'Musterstadt']],
            'employment' => ['job_title' => 'Entwickler', 'cost_center' => ['cost_center_id' => 'K1']],
        ]);

        $endpoint = new EmployeeExportsEndpoint($this->client, self::CLIENT_ID, self::EMPLOYEE_ID);

        $tax = $endpoint->getTaxPayments(['payroll_accounting_month' => '2026-06']);
        $this->assertInstanceOf(TaxPayments::class, $tax);
        $this->assertSame(512.5, $tax->getWageTax());

        $salary = $endpoint->getSalaryPayments();
        $this->assertInstanceOf(SalaryPayments::class, $salary);
        $this->assertSame('Gehalt', $salary->getGrossPaymentsLodas()?->getFirstValue()?->getWageTypeName());
        $this->assertSame(40.0, $salary->getNetPayments()?->getFirstValue()?->getNetPaymentAmount());

        $masterData = $endpoint->getMasterData();
        $this->assertInstanceOf(MasterData::class, $masterData);
        $this->assertSame('Mustermann', $masterData->getPersonalData()?->getSurname());
        $this->assertSame('K1', $masterData->getEmployment()?->getCostCenter()?->getCostCenterId());

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $this->assertStringContainsString('payroll_accounting_month=2026-06', $requests[count($requests) - 3]['uri']);
    }

    public function test_client_level_exports_return_collections(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/employees/taxpayments', 200, [
            ['personnel_number' => 7, 'wage_tax' => 512.5],
            ['personnel_number' => 8, 'wage_tax' => 301.0],
        ]);

        $endpoint = new ClientExportsEndpoint($this->client, self::CLIENT_ID);
        $list = $endpoint->getTaxPayments();

        $this->assertInstanceOf(TaxPaymentsList::class, $list);
        $this->assertSame(2, $list->count());
        $first = $list->getFirstValue();
        $this->assertNotNull($first);
        $this->assertSame(7, $first->getPersonnelNumber());
    }

    public function test_resolve_employee_id(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID . '/employeeids/F-0815', 200, [
            'personnel_number' => 7, 'company_personnel_number' => 'F-0815',
        ]);

        $endpoint = new EmployeeIdsEndpoint($this->client, self::CLIENT_ID);
        $ids = $endpoint->resolve('F-0815');

        $this->assertNotNull($ids);

        if ($this->isUsingMock()) {
            $this->assertSame(7, $ids->getPersonnelNumber());
            $this->assertSame('F-0815', $ids->getCompanyPersonnelNumber());
        }
    }
}
