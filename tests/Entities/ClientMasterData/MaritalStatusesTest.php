<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatuses;
use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatus;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class MaritalStatusesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ms-1", "status" => "SINGLE"],
                ["id" => "ms-2", "status" => "MARRIED"]
            ]
        ];
        $collection = new MaritalStatuses($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MaritalStatus::class, $collection->getValues()[0]);
    }
}
