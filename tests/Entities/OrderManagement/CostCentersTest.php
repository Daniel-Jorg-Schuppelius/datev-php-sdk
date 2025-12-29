<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\CostCenters\CostCenters;
use Datev\Entities\OrderManagement\CostCenters\CostCenter;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostCentersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cc-1", "cost_center_number" => "100", "cost_center_name" => "Cost Center 1"],
                ["id" => "cc-2", "cost_center_number" => "200", "cost_center_name" => "Cost Center 2"]
            ]
        ];
        $collection = new CostCenters($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostCenter::class, $collection->getValues()[0]);
    }
}
