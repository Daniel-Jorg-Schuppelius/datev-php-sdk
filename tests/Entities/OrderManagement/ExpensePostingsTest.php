<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\ExpensePostings\ExpensePostings;
use Datev\Entities\OrderManagement\ExpensePostings\ExpensePosting;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ExpensePostingsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ep-1", "order_id" => 1, "cost_amount" => 500.00],
                ["id" => "ep-2", "order_id" => 2, "cost_amount" => 750.00]
            ]
        ];
        $collection = new ExpensePostings($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpensePosting::class, $collection->getValues()[0]);
    }
}
