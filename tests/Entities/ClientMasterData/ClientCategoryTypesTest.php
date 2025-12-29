<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryTypes;
use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ClientCategoryTypesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cct-1", "name" => "Type 1"],
                ["id" => "cct-2", "name" => "Type 2"]
            ]
        ];
        $collection = new ClientCategoryTypes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientCategoryType::class, $collection->getValues()[0]);
    }
}
