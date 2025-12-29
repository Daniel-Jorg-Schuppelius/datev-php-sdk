<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\CostItems\CostItems;
use Datev\Entities\OrderManagement\CostItems\CostItem;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostItemsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ci-1", "cost_position" => "CP001", "cost_position_name" => "Cost Item 1"],
                ["id" => "ci-2", "cost_position" => "CP002", "cost_position_name" => "Cost Item 2"]
            ]
        ];
        $collection = new CostItems($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostItem::class, $collection->getValues()[0]);
    }
}
