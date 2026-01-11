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

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\Employees\Employee;
use Datev\Entities\Common\Employees\EmployeeID;
use Datev\Entities\Common\Employees\Employees;

class EmployeeTest extends EntityTest {
    public function testCreateEmployeeID() {
        $id = new EmployeeID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(EmployeeID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function testCreateEmployee() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012"
        ];

        $employee = new Employee($data);
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertNotNull($employee->getID());
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $employee->getID()->toString());
    }

    public function testCreateEmployees() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012"
            ],
            [
                "id" => "12345678-1234-1234-1234-123456789013"
            ]
        ];

        $employees = new Employees($data);
        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertCount(2, $employees);
    }
}
