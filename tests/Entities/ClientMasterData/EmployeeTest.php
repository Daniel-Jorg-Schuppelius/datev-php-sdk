<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Employees\Employee;
use Datev\Entities\ClientMasterData\Employees\Employees;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase {
    public function testCreateEmployee() {
        $data = [
            "id" => "e23f9c3c-380c-494e-97c8-d12fff738189",
            "name" => "Mustermann, Max",
            "display_name" => "Mustermann, Max",
            "number" => 1001,
            "natural_person_id" => "d13f9c3c-380c-494e-97c8-d12fff738189",
            "functional_area_id" => "f23f9c3c-380c-494e-97c8-d12fff738189"
        ];

        $employee = new Employee($data);
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertNotNull($employee->getID());
        $this->assertEquals("Mustermann, Max", $employee->getName());
        $this->assertEquals(1001, $employee->getNumber());
    }

    public function testCreateEmployees() {
        $data = [
            [
                "id" => "e23f9c3c-380c-494e-97c8-d12fff738189",
                "name" => "Mustermann, Max",
                "natural_person_id" => "d13f9c3c-380c-494e-97c8-d12fff738189",
                "functional_area_id" => "f23f9c3c-380c-494e-97c8-d12fff738189"
            ]
        ];

        $employees = new Employees($data);
        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertCount(1, $employees);
    }
}
