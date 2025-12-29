<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostSystems\CostSystems;
use Datev\Entities\Accounting\CostSystems\CostSystem;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostSystemsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sys-1", "caption" => "Kostenstellen", "cost_system_type" => "cost_center", "is_active" => true],
                ["id" => "sys-2", "caption" => "Kostenträger", "cost_system_type" => "cost_unit", "is_active" => true]
            ]
        ];
        $collection = new CostSystems($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostSystem::class, $collection->getValues()[0]);
    }
}
