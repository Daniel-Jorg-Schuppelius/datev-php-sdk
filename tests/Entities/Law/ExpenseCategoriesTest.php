<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\ExpenseCategories\ExpenseCategories;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategory;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ExpenseCategoriesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["number" => 1, "name" => "Travel"],
                ["number" => 2, "name" => "Office"]
            ]
        ];
        $collection = new ExpenseCategories($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpenseCategory::class, $collection->getValues()[0]);
    }
}
