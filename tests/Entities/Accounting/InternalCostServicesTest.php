<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\InternalCostServices\InternalCostServices;
use Datev\Entities\Accounting\InternalCostServices\InternalCostService;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class InternalCostServicesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["amount" => 100.00, "cost_center_from" => "KS100", "cost_center_to" => "KS200", "text" => "Interne Leistung IT"],
                ["amount" => 150.00, "cost_center_from" => "KS200", "cost_center_to" => "KS300", "text" => "Interne Leistung HR"]
            ]
        ];
        $collection = new InternalCostServices($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(InternalCostService::class, $collection->getValues()[0]);
    }
}
