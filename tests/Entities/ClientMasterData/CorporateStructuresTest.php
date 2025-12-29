<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CorporateStructures\CorporateStructures;
use Datev\Entities\ClientMasterData\CorporateStructures\CorporateStructure;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CorporateStructuresTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cs-1", "name" => "Hauptsitz", "number" => 1],
                ["id" => "cs-2", "name" => "Niederlassung", "number" => 2]
            ]
        ];
        $collection = new CorporateStructures($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CorporateStructure::class, $collection->getValues()[0]);
    }
}
