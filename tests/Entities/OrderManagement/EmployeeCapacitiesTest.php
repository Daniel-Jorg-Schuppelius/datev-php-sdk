<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacities;
use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacity;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class EmployeeCapacitiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ec-1", "employee_id" => "emp-1", "total_hours_time_units" => 40.0],
                ["id" => "ec-2", "employee_id" => "emp-2", "total_hours_time_units" => 35.0]
            ]
        ];
        $collection = new EmployeeCapacities($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(EmployeeCapacity::class, $collection->getValues()[0]);
    }
}
