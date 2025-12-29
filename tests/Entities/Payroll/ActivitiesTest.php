<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Activities\Activities;
use Datev\Entities\Payroll\Activities\Activity;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ActivitiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "activity_type" => "standard", "employee_type" => "angestellter", "job_title" => "Software Engineer", "weekly_working_hours" => 40.0],
                ["id" => "00002", "activity_type" => "minijob", "employee_type" => "minijobber", "job_title" => "Aushilfe", "weekly_working_hours" => 10.0]
            ]
        ];
        $collection = new Activities($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Activity::class, $collection->getValues()[0]);
    }
}
