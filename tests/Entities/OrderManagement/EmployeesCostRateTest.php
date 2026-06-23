<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesCostRateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\EmployeesCostRate\{EmployeeCostRate, EmployeesCostRate};
use Tests\Contracts\EntityTest;

class EmployeesCostRateTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "employee_number" => 1001,
                    "cost_rate_number" => 1,
                    "cost_rate_1" => 75.50,
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "employee_number" => 1002,
                    "cost_rate_number" => 2,
                    "cost_rate_1" => 85.00,
                ],
            ],
        ];

        $rates = new EmployeesCostRate($data);

        $this->assertCount(2, $rates->getValues());
        $this->assertInstanceOf(EmployeeCostRate::class, $rates->getValues()[0]);
    }
}
