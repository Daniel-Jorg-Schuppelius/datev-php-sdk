<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Fees\Fees;
use Datev\Entities\OrderManagement\Fees\Fee;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FeesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "fee_position" => "F001", "fee_position_name" => "Consultation Fee"],
                ["id" => 2, "fee_position" => "F002", "fee_position_name" => "Processing Fee"]
            ]
        ];
        $collection = new Fees($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Fee::class, $collection->getValues()[0]);
    }
}
