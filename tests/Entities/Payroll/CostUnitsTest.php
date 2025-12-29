<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\CostUnits\CostUnits;
use Datev\Entities\Payroll\CostUnits\CostUnit;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostUnitsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "name" => "Hauptkostenträger"],
                ["id" => "2", "name" => "Nebenkostenträger"]
            ]
        ];
        $collection = new CostUnits($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostUnit::class, $collection->getValues()[0]);
    }
}
