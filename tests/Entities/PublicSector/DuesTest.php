<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Dues\Dues;
use Datev\Entities\PublicSector\Dues\Due;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DuesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["assessment_period" => "2024-01-01T00:00:00.000+00:00", "tariff_caption" => "Property Tax", "amount" => 500.00],
                ["assessment_period" => "2024-01-01T00:00:00.000+00:00", "tariff_caption" => "Waste Fee", "amount" => 120.00]
            ]
        ];
        $collection = new Dues($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Due::class, $collection->getValues()[0]);
    }
}
