<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Employees\Employees;
use Datev\Entities\Law\Employees\Employee;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class EmployeesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "emp-1", "display_name" => "Attorney 1", "employee_number" => 1001],
                ["id" => "emp-2", "display_name" => "Attorney 2", "employee_number" => 1002]
            ]
        ];
        $collection = new Employees($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
