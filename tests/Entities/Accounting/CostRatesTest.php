<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostRates\CostRates;
use Datev\Entities\Accounting\CostRates\CostRate;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostRatesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["valid_from" => 202401, "valid_to" => 202412, "rate" => 75.00],
                ["valid_from" => 202501, "valid_to" => 202512, "rate" => 80.00]
            ]
        ];
        $collection = new CostRates($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostRate::class, $collection->getValues()[0]);
    }
}
