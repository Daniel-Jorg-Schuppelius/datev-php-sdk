<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\EmployeeGroupEndpoint;
use Datev\Entities\Payroll\Employees\Groups\{EmployeeGroup, EmployeeGroups};
use Tests\Contracts\EndpointTest;

class EmployeeGroupTest extends EndpointTest {
    protected ?EmployeeGroupEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): EmployeeGroupEndpoint {
        return new EmployeeGroupEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize() {
        $data = [
            'id' => 'EG001',
            'name' => 'Mitarbeitergruppe Vollzeit',
        ];

        $group = EmployeeGroup::fromJson(json_encode($data));
        $this->assertInstanceOf(EmployeeGroup::class, $group);
    }

    public function test_json_serialize_collection() {
        $data = [
            ['id' => 'EG001', 'name' => 'Vollzeit'],
            ['id' => 'EG002', 'name' => 'Teilzeit'],
        ];

        $groups = EmployeeGroups::fromJson(json_encode($data));
        $this->assertInstanceOf(EmployeeGroups::class, $groups);
        $this->assertCount(2, $groups->getValues());
    }

    public function test_get_employee_groups() {
        $this->endpoint = $this->createEndpoint();
        $groups = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($groups);
    }
}
