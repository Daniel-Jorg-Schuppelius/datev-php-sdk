<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Registers\Registers;
use Datev\Entities\DocumentManagement\Registers\Register;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class RegistersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "reg-1", "name" => "Inbox"],
                ["id" => "reg-2", "name" => "Outbox"]
            ]
        ];
        $collection = new Registers($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Register::class, $collection->getValues()[0]);
    }
}
