<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Meters\Meters;
use Datev\Entities\PublicSector\Meters\Meter;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class MetersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "meter-1", "number" => "WZ-001", "meter_number" => "12345678", "usagetype" => "water"],
                ["id" => "meter-2", "number" => "WZ-002", "meter_number" => "87654321", "usagetype" => "electricity"]
            ]
        ];
        $collection = new Meters($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Meter::class, $collection->getValues()[0]);
    }
}
