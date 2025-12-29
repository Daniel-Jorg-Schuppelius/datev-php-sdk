<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Employees\Employees;
use Datev\Entities\DocumentManagement\Employees\Employee;
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
                ["id" => "emp-1", "name" => "Max Mustermann"],
                ["id" => "emp-2", "name" => "Erika Musterfrau"]
            ]
        ];
        $collection = new Employees($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Employee::class, $collection->getValues()[0]);
    }
}
