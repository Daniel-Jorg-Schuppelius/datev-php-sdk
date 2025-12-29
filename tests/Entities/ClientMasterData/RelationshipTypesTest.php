<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipTypes;
use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class RelationshipTypesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rt-1", "type" => 1, "name" => "Parent"],
                ["id" => "rt-2", "type" => 2, "name" => "Subsidiary"]
            ]
        ];
        $collection = new RelationshipTypes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RelationshipType::class, $collection->getValues()[0]);
    }
}
