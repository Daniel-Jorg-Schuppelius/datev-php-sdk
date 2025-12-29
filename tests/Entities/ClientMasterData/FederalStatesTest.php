<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStates\FederalStates;
use Datev\Entities\ClientMasterData\FederalStates\FederalState;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FederalStatesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "fs-1", "code" => "BY", "name" => "Bayern"],
                ["id" => "fs-2", "code" => "NW", "name" => "Nordrhein-Westfalen"]
            ]
        ];
        $collection = new FederalStates($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FederalState::class, $collection->getValues()[0]);
    }
}
