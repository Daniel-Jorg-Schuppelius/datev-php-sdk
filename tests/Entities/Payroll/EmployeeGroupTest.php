<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Employees\Groups\{EmployeeGroup, EmployeeGroups};
use Tests\Contracts\EntityTest;

class EmployeeGroupTest extends EntityTest {
    public function test_create_employee_group(): void {
        $data = [
            "number" => "001",
            "name" => "Vollzeit-Mitarbeiter",
            "clearing_account_id" => 1234,
        ];

        $employeeGroup = new EmployeeGroup($data);

        $this->assertInstanceOf(EmployeeGroup::class, $employeeGroup);
    }

    public function test_create_employee_groups(): void {
        $data = [
            "content" => [
                [
                    "number" => "001",
                    "name" => "Vollzeit",
                ],
                [
                    "number" => "002",
                    "name" => "Teilzeit",
                ],
            ],
        ];

        $employeeGroups = new EmployeeGroups($data);

        $this->assertInstanceOf(EmployeeGroups::class, $employeeGroups);
        $this->assertCount(2, $employeeGroups);
    }
}
