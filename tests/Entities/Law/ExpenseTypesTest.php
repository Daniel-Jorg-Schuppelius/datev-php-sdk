<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\ExpenseTypes\ExpenseTypes;
use Datev\Entities\Law\ExpenseTypes\ExpenseType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ExpenseTypesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "et-1", "name" => "Transport", "short_name" => "TRANS"],
                ["id" => "et-2", "name" => "Meals", "short_name" => "MEAL"]
            ]
        ];
        $collection = new ExpenseTypes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpenseType::class, $collection->getValues()[0]);
    }
}
