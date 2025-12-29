<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeCapacityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacity;
use Datev\Entities\OrderManagement\EmployeeCapacities\EmployeeCapacities;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class EmployeeCapacityTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateEmployeeCapacity(): void {
        $data = [
            "id" => "test-id",
            "employee_id" => "550e8400-e29b-41d4-a716-446655440000",
            "date" => "2024-01-15",
            "total_hours_time_units" => 40.0,
            "target_hours_time_units" => 38.5,
            "planned_hours_time_units" => 36.0,
            "spare_hours_time_units" => 4.0
        ];

        $employeeCapacity = new EmployeeCapacity($data, $this->logger);

        $this->assertInstanceOf(EmployeeCapacity::class, $employeeCapacity);
        $this->assertEquals(40.0, $employeeCapacity->getTotalHoursTimeUnits());
    }

    public function testCreateEmployeeCapacities(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "total_hours_time_units" => 40.0
                ],
                [
                    "id" => "test-id-2",
                    "total_hours_time_units" => 35.0
                ]
            ]
        ];

        $employeeCapacities = new EmployeeCapacities($data, $this->logger);

        $this->assertInstanceOf(EmployeeCapacities::class, $employeeCapacities);
        $this->assertCount(2, $employeeCapacities);
    }
}
