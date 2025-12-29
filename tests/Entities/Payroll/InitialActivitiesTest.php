<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\InitialActivities\InitialActivities;
use Datev\Entities\Payroll\InitialActivities\InitialActivity;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class InitialActivitiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "reference_date" => "2024-01-01", "activity_type" => "standard", "weekly_working_hours" => 40.0],
                ["id" => "00002", "reference_date" => "2024-02-01", "activity_type" => "minijob", "weekly_working_hours" => 10.0]
            ]
        ];
        $collection = new InitialActivities($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(InitialActivity::class, $collection->getValues()[0]);
    }
}
