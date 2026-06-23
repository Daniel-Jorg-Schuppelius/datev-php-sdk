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

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Employees\{Employee, Employees};
use Tests\Contracts\EntityTest;

class EmployeeTest extends EntityTest {
    public function test_create_employee(): void {
        $data = [
            "name" => "Max Mustermann",
            "is_active" => true,
        ];

        $employee = new Employee($data);

        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals("Max Mustermann", $employee->getName());
        $this->assertTrue($employee->isActive());
    }

    public function test_create_employees(): void {
        $data = [
            "content" => [
                [
                    "name" => "Max Mustermann",
                    "is_active" => true,
                ],
                [
                    "name" => "Erika Musterfrau",
                    "is_active" => false,
                ],
            ],
        ];

        $employees = new Employees($data);

        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertCount(2, $employees);
        $this->assertInstanceOf(Employee::class, $employees->getValues()[0]);
    }
}
