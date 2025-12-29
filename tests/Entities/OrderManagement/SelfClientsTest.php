<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\SelfClients\SelfClients;
use Datev\Entities\OrderManagement\SelfClients\SelfClient;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SelfClientsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sc-1", "client_name" => "Self Client 1"],
                ["id" => "sc-2", "client_name" => "Self Client 2"]
            ]
        ];
        $collection = new SelfClients($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SelfClient::class, $collection->getValues()[0]);
    }
}
