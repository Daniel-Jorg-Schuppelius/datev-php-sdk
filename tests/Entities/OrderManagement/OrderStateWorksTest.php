<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWorks;
use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWork;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class OrderStateWorksTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "osw-1", "order_id" => 1, "order_number" => 1001],
                ["id" => "osw-2", "order_id" => 2, "order_number" => 1002]
            ]
        ];
        $collection = new OrderStateWorks($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(OrderStateWork::class, $collection->getValues()[0]);
    }
}
