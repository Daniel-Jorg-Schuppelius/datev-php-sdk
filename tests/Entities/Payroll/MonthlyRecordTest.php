<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthlyRecordTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\MonthlyRecords\{MonthlyRecord, MonthlyRecordID, MonthlyRecords};
use Tests\Contracts\EntityTest;

class MonthlyRecordTest extends EntityTest {
    public function test_create_monthly_record(): void {
        $data = [
            "id" => "mr-001",
            "personnel_number" => "12345",
            "value" => 5000.00,
            "origin" => "manual",
        ];

        $monthlyRecord = new MonthlyRecord($data);

        $this->assertInstanceOf(MonthlyRecord::class, $monthlyRecord);
        $this->assertInstanceOf(MonthlyRecordID::class, $monthlyRecord->getID());
        $this->assertEquals("mr-001", $monthlyRecord->getID()->getValue());
        $this->assertEquals("12345", $monthlyRecord->getPersonnelNumber());
        $this->assertEquals(5000.00, $monthlyRecord->getValue());
        $this->assertEquals("manual", $monthlyRecord->getOrigin());
    }

    public function test_create_monthly_records(): void {
        $data = [
            "content" => [
                [
                    "id" => "mr-001",
                    "personnel_number" => "12345",
                    "value" => 5000.00,
                ],
                [
                    "id" => "mr-002",
                    "personnel_number" => "67890",
                    "value" => 4500.00,
                ],
            ],
        ];

        $monthlyRecords = new MonthlyRecords($data);

        $this->assertInstanceOf(MonthlyRecords::class, $monthlyRecords);
        $this->assertCount(2, $monthlyRecords);
        $this->assertInstanceOf(MonthlyRecord::class, $monthlyRecords->getValues()[0]);
    }
}
