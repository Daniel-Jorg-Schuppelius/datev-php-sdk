<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DepartmentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Departments\Department;
use Datev\Entities\Law\Departments\Departments;

class DepartmentTest extends EntityTest {
    public function testCreateDepartment() {
        $data = [
            "id" => "d1234567-8901-2345-6789-012345678901",
            "number" => 1,
            "short_name" => "ZR",
            "name" => "Zivilrecht"
        ];

        $department = new Department($data);
        $this->assertInstanceOf(Department::class, new Department());
        $this->assertInstanceOf(Department::class, $department);
        $this->assertEquals("ZR", $department->getShortName());
        $this->assertEquals("Zivilrecht", $department->getName());
        $this->assertEquals(1, $department->getNumber());
    }

    public function testCreateDepartments() {
        $data = [
            "content" => [
                [
                    "id" => "d1234567-8901-2345-6789-012345678901",
                    "name" => "Zivilrecht"
                ],
                [
                    "id" => "d2234567-8901-2345-6789-012345678902",
                    "name" => "Strafrecht"
                ]
            ]
        ];

        $departments = new Departments($data);
        $this->assertInstanceOf(Departments::class, $departments);
        $this->assertCount(2, $departments->getValues());
    }
}
