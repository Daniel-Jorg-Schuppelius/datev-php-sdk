<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Surnames\Surnames;
use Datev\Entities\ClientMasterData\Surnames\Surname;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SurnamesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sur-1", "surname" => "Müller"],
                ["id" => "sur-2", "surname" => "Schmidt"]
            ]
        ];
        $collection = new Surnames($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Surname::class, $collection->getValues()[0]);
    }
}
