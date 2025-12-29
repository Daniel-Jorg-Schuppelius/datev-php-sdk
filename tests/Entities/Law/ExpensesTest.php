<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Expenses\Expenses;
use Datev\Entities\Law\Expenses\Expense;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ExpensesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "exp-1", "object_type" => "travel", "unit_value" => 250.00],
                ["id" => "exp-2", "object_type" => "hotel", "unit_value" => 150.00]
            ]
        ];
        $collection = new Expenses($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Expense::class, $collection->getValues()[0]);
    }
}
