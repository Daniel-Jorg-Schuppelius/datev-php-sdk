<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\OrderTypes\OrderTypes;
use Datev\Entities\OrderManagement\OrderTypes\OrderType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class OrderTypesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ot-1", "ordertype" => "STD", "ordertype_name" => "Standard Order"],
                ["id" => "ot-2", "ordertype" => "EXP", "ordertype_name" => "Express Order"]
            ]
        ];
        $collection = new OrderTypes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(OrderType::class, $collection->getValues()[0]);
    }
}
