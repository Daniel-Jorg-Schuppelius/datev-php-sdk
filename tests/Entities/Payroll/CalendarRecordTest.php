<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CalendarRecordTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\CalendarRecords\CalendarRecord;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecords;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecordID;

class CalendarRecordTest extends EntityTest {
    public function testCreateCalendarRecord(): void {
        $data = [
            "id" => "cr-001",
            "personnel_number" => "12345",
            "hours" => 8.0,
            "days" => 1.0
        ];

        $calendarRecord = new CalendarRecord($data);

        $this->assertInstanceOf(CalendarRecord::class, $calendarRecord);
        $this->assertInstanceOf(CalendarRecordID::class, $calendarRecord->getID());
        $this->assertEquals("cr-001", $calendarRecord->getID()->getValue());
        $this->assertEquals("12345", $calendarRecord->getPersonnelNumber());
        $this->assertEquals(8.0, $calendarRecord->getHours());
        $this->assertEquals(1.0, $calendarRecord->getDays());
    }

    public function testCreateCalendarRecords(): void {
        $data = [
            "content" => [
                [
                    "id" => "cr-001",
                    "personnel_number" => "12345",
                    "hours" => 8.0
                ],
                [
                    "id" => "cr-002",
                    "personnel_number" => "67890",
                    "hours" => 4.0
                ]
            ]
        ];

        $calendarRecords = new CalendarRecords($data);

        $this->assertInstanceOf(CalendarRecords::class, $calendarRecords);
        $this->assertCount(2, $calendarRecords);
        $this->assertInstanceOf(CalendarRecord::class, $calendarRecords->getValues()[0]);
    }
}
