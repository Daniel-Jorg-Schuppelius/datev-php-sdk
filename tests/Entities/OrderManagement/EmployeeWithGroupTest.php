<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeWithGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\EmployeesWithGroup\EmployeeWithGroup;
use Datev\Entities\OrderManagement\EmployeesWithGroup\EmployeesWithGroup;

class EmployeeWithGroupTest extends EntityTest {
    public function testCreateEmployeeWithGroup() {
        $data = [
            "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
            "employee_id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
            "employee_number" => 100,
            "employee_name" => "Max Mustermann",
            "employee_group_id" => 1,
            "employee_group_id_guid" => "c3d4e5f6-a7b8-9012-cdef-123456789012",
            "employee_group_short_name" => "Team A",
            "employee_group_long_name" => "Team A - Steuerberatung"
        ];        $employeeGroup = new EmployeeWithGroup($data);

        $this->assertInstanceOf(EmployeeWithGroup::class, $employeeGroup);
        $this->assertEquals(100, $employeeGroup->getEmployeeNumber());
        $this->assertEquals("Max Mustermann", $employeeGroup->getEmployeeName());
        $this->assertEquals(1, $employeeGroup->getEmployeeGroupId());
        $this->assertEquals("Team A", $employeeGroup->getEmployeeGroupShortName());
    }

    public function testCreateEmployeesWithGroup() {
        $data = [
            "content" => [
                [
                    "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
                    "employee_number" => 100,
                    "employee_name" => "Max Mustermann",
                    "employee_group_short_name" => "Team A"
                ],
                [
                    "id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
                    "employee_number" => 101,
                    "employee_name" => "Erika Musterfrau",
                    "employee_group_short_name" => "Team B"
                ]
            ]
        ];        $employees = new EmployeesWithGroup($data);

        $this->assertInstanceOf(EmployeesWithGroup::class, $employees);
        $this->assertCount(2, $employees->getValues());
    }
}
