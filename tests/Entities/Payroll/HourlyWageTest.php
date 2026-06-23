<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HourlyWageTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\HourlyWages\{HourlyWage, HourlyWageID, HourlyWages};
use Tests\Contracts\EntityTest;

class HourlyWageTest extends EntityTest {
    public function test_create_hourly_wage(): void {
        $data = [
            "id" => "hw-001",
            "personnel_number" => "12345",
            "amount" => 25.50,
        ];

        $hourlyWage = new HourlyWage($data);

        $this->assertInstanceOf(HourlyWage::class, $hourlyWage);
        $this->assertInstanceOf(HourlyWageID::class, $hourlyWage->getID());
        $this->assertEquals("hw-001", $hourlyWage->getID()->getValue());
        $this->assertEquals("12345", $hourlyWage->getPersonnelNumber());
        $this->assertEquals(25.50, $hourlyWage->getAmount());
    }

    public function test_create_hourly_wages(): void {
        $data = [
            "content" => [
                [
                    "id" => "hw-001",
                    "personnel_number" => "12345",
                    "amount" => 25.50,
                ],
                [
                    "id" => "hw-002",
                    "personnel_number" => "67890",
                    "amount" => 30.00,
                ],
            ],
        ];

        $hourlyWages = new HourlyWages($data);

        $this->assertInstanceOf(HourlyWages::class, $hourlyWages);
        $this->assertCount(2, $hourlyWages);
        $this->assertInstanceOf(HourlyWage::class, $hourlyWages->getValues()[0]);
    }
}
