<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeGroupAccountingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Employees\Groups\Accountings\{EmployeeGroupAccounting, EmployeeGroupAccountings};
use Tests\Contracts\EntityTest;

class EmployeeGroupAccountingTest extends EntityTest {
    public function test_create_employee_group_accounting(): void {
        $data = [
            "number" => "001",
            "name" => "Buchhaltung Team A",
            "contact_person" => "Max Mustermann",
        ];

        $employeeGroupAccounting = new EmployeeGroupAccounting($data);

        $this->assertInstanceOf(EmployeeGroupAccounting::class, $employeeGroupAccounting);
    }

    public function test_create_employee_groups_accounting(): void {
        $data = [
            "content" => [
                [
                    "number" => "001",
                    "name" => "Buchhaltung Team A",
                ],
                [
                    "number" => "002",
                    "name" => "Buchhaltung Team B",
                ],
            ],
        ];

        $employeeGroupsAccounting = new EmployeeGroupAccountings($data);

        $this->assertInstanceOf(EmployeeGroupAccountings::class, $employeeGroupsAccounting);
        $this->assertCount(2, $employeeGroupsAccounting);
    }
}
