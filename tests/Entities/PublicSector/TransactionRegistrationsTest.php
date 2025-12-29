<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistrations;
use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistration;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class TransactionRegistrationsTest extends TestCase {
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
        $collection = new TransactionRegistrations($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionRegistration::class, $collection->getValues()[0]);
    }
}
