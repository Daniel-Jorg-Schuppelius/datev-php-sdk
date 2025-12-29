<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ActivityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Activities\Activity;
use Datev\Entities\Payroll\Activities\Activities;
use Datev\Entities\Payroll\Activities\ActivityID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase {
    public function testCreateActivity(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "act-001",
            "activity_type" => "Vollzeit",
            "employee_type" => "Angestellter",
            "job_title" => "Buchhalter",
            "weekly_working_hours" => 40.0
        ];

        $activity = new Activity($data, $logger);

        $this->assertInstanceOf(Activity::class, $activity);
        $this->assertInstanceOf(ActivityID::class, $activity->getID());
        $this->assertEquals("act-001", $activity->getID()->getValue());
    }

    public function testCreateActivities(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "act-001",
                    "activity_type" => "Vollzeit",
                    "job_title" => "Buchhalter"
                ],
                [
                    "id" => "act-002",
                    "activity_type" => "Teilzeit",
                    "job_title" => "Assistent"
                ]
            ]
        ];

        $activities = new Activities($data, $logger);

        $this->assertInstanceOf(Activities::class, $activities);
        $this->assertCount(2, $activities);
        $this->assertInstanceOf(Activity::class, $activities->getValues()[0]);
    }
}
