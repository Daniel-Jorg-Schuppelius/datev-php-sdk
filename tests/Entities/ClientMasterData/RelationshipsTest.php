<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Relationships\Relationships;
use Datev\Entities\ClientMasterData\Relationships\Relationship;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class RelationshipsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rel-1", "name" => "Muttergesellschaft", "abbreviation" => "MUT"],
                ["id" => "rel-2", "name" => "Tochtergesellschaft", "abbreviation" => "TOC"]
            ]
        ];
        $collection = new Relationships($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Relationship::class, $collection->getValues()[0]);
    }
}
