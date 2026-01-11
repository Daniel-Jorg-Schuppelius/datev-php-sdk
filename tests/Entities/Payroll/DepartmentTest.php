<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DepartmentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Departments\Department;
use Datev\Entities\Payroll\Departments\Departments;

class DepartmentTest extends EntityTest {
    public function testCreateDepartment() {
        $data = [
            "id" => 1,
            "name" => "Buchhaltung",
            "contact_person" => "Max Mustermann"
        ];        $department = new Department($data);

        $this->assertInstanceOf(Department::class, $department);
        $this->assertEquals("Buchhaltung", $department->getName());
        $this->assertEquals("Max Mustermann", $department->getContactPerson());
    }

    public function testCreateDepartments() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "name" => "Buchhaltung"
                ],
                [
                    "id" => 2,
                    "name" => "Personal"
                ]
            ]
        ];        $departments = new Departments($data);

        $this->assertInstanceOf(Departments::class, $departments);
        $this->assertCount(2, $departments->getValues());
    }
}
