<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalAreas;
use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalArea;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FunctionalAreasTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "fa-1", "name" => "Sales"],
                ["id" => "fa-2", "name" => "Marketing"]
            ]
        ];
        $collection = new FunctionalAreas($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FunctionalArea::class, $collection->getValues()[0]);
    }
}
