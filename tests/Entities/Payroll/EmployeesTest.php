<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Employees\{Employee, Employees};
use Tests\Contracts\EntityTest;

class EmployeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "00001",
                    "surname" => "Mustermann",
                    "first_name" => "Max",
                    "company_personnel_number" => "00001",
                    "date_of_commencement_of_employment" => "2024-01-01",
                ],
                [
                    "id" => "00002",
                    "surname" => "Musterfrau",
                    "first_name" => "Erika",
                    "company_personnel_number" => "00002",
                    "date_of_commencement_of_employment" => "2024-02-01",
                ],
            ],
        ];

        $employees = new Employees($data);

        $this->assertCount(2, $employees->getValues());
        $this->assertInstanceOf(Employee::class, $employees->getValues()[0]);
    }
}
