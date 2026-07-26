<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupAccountingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\EmployeeGroupAccountingEndpoint;
use Datev\Entities\Payroll\Employees\Groups\Accountings\{EmployeeGroupAccounting, EmployeeGroupAccountings};
use Tests\Contracts\EndpointTest;

class EmployeeGroupAccountingTest extends EndpointTest {
    protected ?EmployeeGroupAccountingEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): EmployeeGroupAccountingEndpoint {
        return new EmployeeGroupAccountingEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => 'EGA001',
            'name' => 'Abrechnungsgruppe Standard',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $accounting = EmployeeGroupAccounting::fromJson($json);
        $this->assertInstanceOf(EmployeeGroupAccounting::class, $accounting);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => 'EGA001', 'name' => 'Standard'],
            ['id' => 'EGA002', 'name' => 'Führungskräfte'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $accountings = EmployeeGroupAccountings::fromJson($json);
        $this->assertInstanceOf(EmployeeGroupAccountings::class, $accountings);
        $this->assertCount(2, $accountings->getValues());
    }

    public function test_get_employee_group_accountings(): void {
        $this->endpoint = $this->createEndpoint();
        $accountings = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($accountings);
    }
}
