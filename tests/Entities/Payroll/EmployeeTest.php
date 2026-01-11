<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Employees\Employee;
use Datev\Entities\Payroll\Employees\Employees;

class EmployeeTest extends EntityTest {
    public function testCreateEmployee() {
        $data = [
            "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
            "surname" => "Mustermann",
            "first_name" => "Max",
            "company_personnel_number" => "EMP001",
            "date_of_commencement_of_employment" => "2020-01-15"
        ];        $employee = new Employee($data);

        $this->assertInstanceOf(Employee::class, $employee);
    }

    public function testCreateEmployees() {
        $data = [
            "content" => [
                [
                    "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
                    "surname" => "Mustermann",
                    "first_name" => "Max"
                ],
                [
                    "id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
                    "surname" => "Musterfrau",
                    "first_name" => "Erika"
                ]
            ]
        ];        $employees = new Employees($data);

        $this->assertInstanceOf(Employees::class, $employees);
        $this->assertCount(2, $employees->getValues());
    }
}
