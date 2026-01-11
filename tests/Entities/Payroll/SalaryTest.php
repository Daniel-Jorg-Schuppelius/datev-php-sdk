<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SalaryTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Salaries\Salary;
use Datev\Entities\Payroll\Salaries\Salaries;

class SalaryTest extends EntityTest {
    public function testCreateSalary() {
        $data = [
            "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
            "personnel_number" => "EMP001",
            "date_of_emergence" => "2025-01-01",
            "current_gross_payment" => 5000.00,
            "net_income" => 3200.00,
            "amount_paid" => 3200.00
        ];        $salary = new Salary($data);

        $this->assertInstanceOf(Salary::class, $salary);
    }

    public function testCreateSalaries() {
        $data = [
            "content" => [
                [
                    "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
                    "personnel_number" => "EMP001",
                    "current_gross_payment" => 5000.00
                ],
                [
                    "id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
                    "personnel_number" => "EMP002",
                    "current_gross_payment" => 4500.00
                ]
            ]
        ];        $salaries = new Salaries($data);

        $this->assertInstanceOf(Salaries::class, $salaries);
        $this->assertCount(2, $salaries->getValues());
    }
}
