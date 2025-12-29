<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\ChargeRates\ChargeRates;
use Datev\Entities\OrderManagement\ChargeRates\ChargeRate;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ChargeRatesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cr-1", "employee_id" => "emp-1", "charge_rate_1" => 150.00],
                ["id" => "cr-2", "employee_id" => "emp-2", "charge_rate_1" => 250.00]
            ]
        ];
        $collection = new ChargeRates($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ChargeRate::class, $collection->getValues()[0]);
    }
}
