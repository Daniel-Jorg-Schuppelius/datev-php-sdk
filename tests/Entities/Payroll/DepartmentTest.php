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

use Datev\Entities\Payroll\Departments\Department;
use Datev\Entities\Payroll\Departments\Departments;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class DepartmentTest extends TestCase {
    public function testCreateDepartment() {
        $data = [
            "id" => 1,
            "name" => "Buchhaltung",
            "contact_person" => "Max Mustermann"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $department = new Department($data, $logger);

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
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $departments = new Departments($data, $logger);

        $this->assertInstanceOf(Departments::class, $departments);
        $this->assertCount(2, $departments->getValues());
    }
}
