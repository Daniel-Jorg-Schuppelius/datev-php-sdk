<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountableEmployeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\AccountableEmployeesEndpoint;
use Datev\Entities\Payroll\Employees\Accountable\AccountableEmployee;
use Datev\Entities\Payroll\Employees\Accountable\AccountableEmployees;
use Tests\Contracts\EndpointTest;

class AccountableEmployeesTest extends EndpointTest {
    protected ?AccountableEmployeesEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): AccountableEmployeesEndpoint {
        return new AccountableEmployeesEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'first_name' => 'Max',
            'last_name' => 'Mustermann'
        ];

        $employee = AccountableEmployee::fromJson(json_encode($data));
        $this->assertInstanceOf(AccountableEmployee::class, $employee);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'first_name' => 'Max', 'last_name' => 'Mustermann'],
            ['id' => '12346', 'first_name' => 'Erika', 'last_name' => 'Musterfrau']
        ];

        $employees = AccountableEmployees::fromJson(json_encode($data));
        $this->assertInstanceOf(AccountableEmployees::class, $employees);
        $this->assertCount(2, $employees->getValues());
    }

    public function testGetAccountableEmployees() {
        $this->endpoint = $this->createEndpoint();
        $employees = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($employees);
    }
}
