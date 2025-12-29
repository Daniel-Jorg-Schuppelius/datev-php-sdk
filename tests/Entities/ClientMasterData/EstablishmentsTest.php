<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Establishments\Establishments;
use Datev\Entities\ClientMasterData\Establishments\Establishment;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class EstablishmentsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "est-1", "name" => "Hauptsitz", "short_name" => "HS"],
                ["id" => "est-2", "name" => "Niederlassung", "short_name" => "NL"]
            ]
        ];
        $collection = new Establishments($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Establishment::class, $collection->getValues()[0]);
    }
}
