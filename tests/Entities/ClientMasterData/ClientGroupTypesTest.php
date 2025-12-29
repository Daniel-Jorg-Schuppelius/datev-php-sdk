<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupTypes;
use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ClientGroupTypesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cgt-1", "name" => "Group Type 1"],
                ["id" => "cgt-2", "name" => "Group Type 2"]
            ]
        ];
        $collection = new ClientGroupTypes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroupType::class, $collection->getValues()[0]);
    }
}
