<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : WorkingHoursTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\WorkingHours\WorkingHours;
use Datev\Entities\Payroll\WorkingHours\WorkingHoursID;

class WorkingHoursTest extends EntityTest {
    public function testCreateWorkingHours(): void {
        $data = [
            "id" => "wh-001",
            "weekly_working_hours" => 40.0,
            "allocation_of_working_hours_monday" => 8.0,
            "allocation_of_working_hours_tuesday" => 8.0,
            "allocation_of_working_hours_wednesday" => 8.0,
            "allocation_of_working_hours_thursday" => 8.0,
            "allocation_of_working_hours_friday" => 8.0,
            "allocation_of_working_hours_saturday" => 0.0,
            "allocation_of_working_hours_sunday" => 0.0
        ];

        $workingHours = new WorkingHours($data);

        $this->assertInstanceOf(WorkingHours::class, $workingHours);
        $this->assertInstanceOf(WorkingHoursID::class, $workingHours->getID());
        $this->assertEquals("wh-001", $workingHours->getID()->getValue());
        $this->assertEquals(40.0, $workingHours->getWeeklyWorkingHours());
        $this->assertEquals(8.0, $workingHours->getAllocationOfWorkingHoursMonday());
        $this->assertEquals(8.0, $workingHours->getAllocationOfWorkingHoursTuesday());
    }
}
