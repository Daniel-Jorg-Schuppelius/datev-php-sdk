<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesWithGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\EmployeesWithGroup\EmployeesWithGroup;
use Datev\Entities\OrderManagement\EmployeesWithGroup\EmployeeWithGroup;

class EmployeesWithGroupTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "employee_number" => 1001,
                    "employee_name" => "Max Mustermann",
                    "employee_group_short_name" => "DEV"
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "employee_number" => 1002,
                    "employee_name" => "Erika Musterfrau",
                    "employee_group_short_name" => "QA"
                ]
            ]
        ];

        $employees = new EmployeesWithGroup($data);

        $this->assertCount(2, $employees->getValues());
        $this->assertInstanceOf(EmployeeWithGroup::class, $employees->getValues()[0]);
    }
}
