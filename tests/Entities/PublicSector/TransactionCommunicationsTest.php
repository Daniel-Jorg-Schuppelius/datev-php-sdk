<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunications;
use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunication;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class TransactionCommunicationsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "notification_e_mail" => "test1@example.com"],
                ["id" => 2, "status" => "pending", "notification_e_mail" => "test2@example.com"]
            ]
        ];
        $collection = new TransactionCommunications($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionCommunication::class, $collection->getValues()[0]);
    }
}
