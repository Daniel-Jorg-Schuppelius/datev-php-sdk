<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountableEmployeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Employees\Accountable\AccountableEmployee;
use Datev\Entities\Payroll\Employees\Accountable\AccountableEmployees;

class AccountableEmployeeTest extends EntityTest {
    public function testCreateAccountableEmployee(): void {
        $data = [
            "id" => "ae-001",
            "surname" => "Mustermann",
            "first_name" => "Max",
            "company_personnel_number" => "EMP001",
            "date_of_commencement_of_employment" => "2020-01-15T00:00:00.000+00:00",
            "date_of_termination_of_employment" => "2024-12-31T00:00:00.000+00:00"
        ];

        $employee = new AccountableEmployee($data);

        $this->assertInstanceOf(AccountableEmployee::class, $employee);
        $this->assertNotNull($employee->getDateOfTerminationOfEmployment());
    }

    public function testCreateAccountableEmployees(): void {
        $data = [
            "content" => [
                [
                    "id" => "ae-001",
                    "surname" => "Mustermann",
                    "first_name" => "Max"
                ],
                [
                    "id" => "ae-002",
                    "surname" => "Musterfrau",
                    "first_name" => "Erika"
                ]
            ]
        ];

        $employees = new AccountableEmployees($data);

        $this->assertInstanceOf(AccountableEmployees::class, $employees);
        $this->assertCount(2, $employees);
        $this->assertInstanceOf(AccountableEmployee::class, $employees->getValues()[0]);
    }
}
