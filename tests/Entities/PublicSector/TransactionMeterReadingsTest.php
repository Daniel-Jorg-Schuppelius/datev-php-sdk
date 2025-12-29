<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReadings;
use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReading;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class TransactionMeterReadingsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "type" => "regular"],
                ["id" => 2, "status" => "pending", "type" => "estimated"]
            ]
        ];
        $collection = new TransactionMeterReadings($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionMeterReading::class, $collection->getValues()[0]);
    }
}
