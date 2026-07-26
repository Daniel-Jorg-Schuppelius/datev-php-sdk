<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DepartmentsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\DepartmentsEndpoint;
use Datev\Entities\Payroll\Departments\{Department, Departments};
use Tests\Contracts\EndpointTest;

class DepartmentsTest extends EndpointTest {
    protected ?DepartmentsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): DepartmentsEndpoint {
        return new DepartmentsEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => 'DEP001',
            'name' => 'Abteilung IT',
            'contact_person' => 'Max Mustermann',
        ];

        $json = json_encode($data);
        $this->assertIsString($json);

        $department = Department::fromJson($json);
        $this->assertInstanceOf(Department::class, $department);
        $this->assertEquals('Abteilung IT', $department->getName());
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => 'DEP001', 'name' => 'IT'],
            ['id' => 'DEP002', 'name' => 'Vertrieb'],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);

        $departments = Departments::fromJson($json);
        $this->assertInstanceOf(Departments::class, $departments);
        $this->assertCount(2, $departments->getValues());
    }

    public function test_get_departments(): void {
        $this->endpoint = $this->createEndpoint();
        $departments = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($departments);
    }
}
