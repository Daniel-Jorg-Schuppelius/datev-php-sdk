<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Departments\Departments;
use Datev\Entities\Law\Departments\Department;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DepartmentsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "dep-1", "name" => "Litigation", "number" => 1, "short_name" => "LIT"],
                ["id" => "dep-2", "name" => "Corporate", "number" => 2, "short_name" => "CORP"]
            ]
        ];
        $collection = new Departments($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Department::class, $collection->getValues()[0]);
    }
}
