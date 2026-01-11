<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecords;
use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecord;

class MonthlyRecordsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "personnel_number" => "00001", "month_of_emergence" => "2024-01-01", "value" => 160.0, "accounting_month" => "2024-01"],
                ["id" => "2", "personnel_number" => "00001", "month_of_emergence" => "2024-02-01", "value" => 152.0, "accounting_month" => "2024-02"]
            ]
        ];
        $collection = new MonthlyRecords($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MonthlyRecord::class, $collection->getValues()[0]);
    }
}
