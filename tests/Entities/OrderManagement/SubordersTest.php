<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Suborders\Suborders;
use Datev\Entities\OrderManagement\Suborders\Suborder;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SubordersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["suborder_id" => 1, "order_id" => 101, "suborder_name" => "Suborder 1"],
                ["suborder_id" => 2, "order_id" => 101, "suborder_name" => "Suborder 2"]
            ]
        ];
        $collection = new Suborders($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Suborder::class, $collection->getValues()[0]);
    }
}
