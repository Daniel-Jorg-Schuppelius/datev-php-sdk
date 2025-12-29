<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientGroups\ClientGroups;
use Datev\Entities\ClientMasterData\ClientGroups\ClientGroup;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ClientGroupsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cg-1", "client_group_type_short_name" => "Group A"],
                ["id" => "cg-2", "client_group_type_short_name" => "Group B"]
            ]
        ];
        $collection = new ClientGroups($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroup::class, $collection->getValues()[0]);
    }
}
