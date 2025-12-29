<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Details\Details;
use Datev\Entities\ClientMasterData\Details\Detail;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DetailsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["salutation" => "Herr", "note" => "VIP Kunde"],
                ["salutation" => "Frau", "note" => "Neukunde"]
            ]
        ];
        $collection = new Details($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Detail::class, $collection->getValues()[0]);
    }
}
