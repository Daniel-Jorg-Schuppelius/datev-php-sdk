<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\VacationEntitlements\VacationEntitlements;
use Datev\Entities\Payroll\VacationEntitlements\VacationEntitlement;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class VacationEntitlementsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "basic_vacation_entitlement" => 28.0, "current_year_vacation_entitlement" => 28.0, "remaining_days_of_vacation_previous_year" => 5.0],
                ["id" => "00002", "basic_vacation_entitlement" => 30.0, "current_year_vacation_entitlement" => 30.0, "remaining_days_of_vacation_previous_year" => 0.0]
            ]
        ];
        $collection = new VacationEntitlements($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(VacationEntitlement::class, $collection->getValues()[0]);
    }
}
