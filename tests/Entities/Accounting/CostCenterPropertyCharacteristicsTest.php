<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristics;
use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\CostCenterPropertyCharacteristic;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostCenterPropertyCharacteristicsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "char-1", "description" => "Fertigung"],
                ["id" => "char-2", "description" => "Verwaltung"]
            ]
        ];
        $collection = new CostCenterPropertyCharacteristics($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostCenterPropertyCharacteristic::class, $collection->getValues()[0]);
    }
}
