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

    public function test_json_serialize() {
        $data = [
            'id' => 'EGA001',
            'name' => 'Abrechnungsgruppe Standard',
        ];

        $accounting = EmployeeGroupAccounting::fromJson(json_encode($data));
        $this->assertInstanceOf(EmployeeGroupAccounting::class, $accounting);
    }

    public function test_json_serialize_collection() {
        $data = [
            ['id' => 'EGA001', 'name' => 'Standard'],
            ['id' => 'EGA002', 'name' => 'Führungskräfte'],
        ];

        $accountings = EmployeeGroupAccountings::fromJson(json_encode($data));
        $this->assertInstanceOf(EmployeeGroupAccountings::class, $accountings);
        $this->assertCount(2, $accountings->getValues());
    }

    public function test_get_employee_group_accountings() {
        $this->endpoint = $this->createEndpoint();
        $accountings = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($accountings);
    }
}
