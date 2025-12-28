<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InitialActivityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\InitialActivities\InitialActivity;
use Datev\Entities\Payroll\InitialActivities\InitialActivities;
use Datev\Entities\Payroll\InitialActivities\InitialActivityID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class InitialActivityTest extends TestCase {
    public function testCreateInitialActivity(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "ia-001",
            "activity_type" => "full_time",
            "employee_type" => "employee",
            "weekly_working_hours" => 40.0,
            "allocation_of_working_hours_monday" => 8.0,
            "allocation_of_working_hours_tuesday" => 8.0,
            "allocation_of_working_hours_wednesday" => 8.0,
            "allocation_of_working_hours_thursday" => 8.0,
            "allocation_of_working_hours_friday" => 8.0
        ];

        $initialActivity = new InitialActivity($data, $logger);

        $this->assertInstanceOf(InitialActivity::class, $initialActivity);
        $this->assertInstanceOf(InitialActivityID::class, $initialActivity->getID());
        $this->assertEquals("ia-001", $initialActivity->getID()->getValue());
        $this->assertEquals("full_time", $initialActivity->getActivityType());
        $this->assertEquals(40.0, $initialActivity->getWeeklyWorkingHours());
    }

    public function testCreateInitialActivities(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "ia-001",
                    "activity_type" => "full_time"
                ],
                [
                    "id" => "ia-002",
                    "activity_type" => "part_time"
                ]
            ]
        ];

        $initialActivities = new InitialActivities($data, $logger);

        $this->assertInstanceOf(InitialActivities::class, $initialActivities);
        $this->assertCount(2, $initialActivities);
        $this->assertInstanceOf(InitialActivity::class, $initialActivities->getValues()[0]);
    }
}
