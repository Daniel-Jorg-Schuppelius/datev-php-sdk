<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeCostRateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\EmployeesCostRate\EmployeeCostRate;
use Datev\Entities\OrderManagement\EmployeesCostRate\EmployeesCostRate;

class EmployeeCostRateTest extends EntityTest {
    public function testCreateEmployeeCostRate() {
        $data = [
            "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
            "employee_id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
            "employee_number" => 100,
            "cost_rate_number" => 1,
            "cost_rate_date_from" => "2025-01-01",
            "cost_rate_date_to" => "2025-12-31",
            "cost_rate_1" => 75.00,
            "cost_rate_2" => 85.00,
            "cost_rate_active" => true
        ];        $costRate = new EmployeeCostRate($data);

        $this->assertInstanceOf(EmployeeCostRate::class, $costRate);
        $this->assertEquals(100, $costRate->getEmployeeNumber());
        $this->assertEquals(1, $costRate->getCostRateNumber());
        $this->assertEquals(75.00, $costRate->getCostRate1());
        $this->assertEquals(85.00, $costRate->getCostRate2());
    }

    public function testCreateEmployeesCostRate() {
        $data = [
            "content" => [
                [
                    "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
                    "employee_number" => 100,
                    "cost_rate_number" => 1,
                    "cost_rate_1" => 75.00
                ],
                [
                    "id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
                    "employee_number" => 101,
                    "cost_rate_number" => 2,
                    "cost_rate_1" => 80.00
                ]
            ]
        ];        $costRates = new EmployeesCostRate($data);

        $this->assertInstanceOf(EmployeesCostRate::class, $costRates);
        $this->assertCount(2, $costRates->getValues());
    }
}
