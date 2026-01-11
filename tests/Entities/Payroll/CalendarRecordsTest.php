<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\CalendarRecords\CalendarRecords;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecord;

class CalendarRecordsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "personnel_number" => "00001", "date_of_emergence" => "2024-01-15", "hours" => 8.0, "days" => 1.0, "accounting_month" => "2024-01"],
                ["id" => "2", "personnel_number" => "00001", "date_of_emergence" => "2024-01-16", "hours" => 4.0, "days" => 0.5, "accounting_month" => "2024-01"]
            ]
        ];
        $collection = new CalendarRecords($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CalendarRecord::class, $collection->getValues()[0]);
    }
}
