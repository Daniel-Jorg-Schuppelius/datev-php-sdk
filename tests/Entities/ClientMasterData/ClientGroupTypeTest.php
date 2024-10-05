<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\ClientGroups\ClientGroup;
use Datev\Entities\ClientMasterData\ClientGroupTypes\ClientGroupType;
use PHPUnit\Framework\TestCase;

class ClientGroupTypeTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateClientGroupTypeTest() {
        $data = [
            "id" => "e93f9cab-380c-494e-47c8-d12fff738192",
            "name" => "Rechnungsgruppe A",
            "note" => "Bemerkung zu Rechnungsgruppe A",
            "short_name" => "RG A",
            "timestamp" => "2019-03-31T00:00:00.000+00:00"
        ];

        $clientGroupType = new ClientGroupType($data, $this->logger);
        $this->assertTrue($clientGroupType->isValid());
        $this->assertInstanceOf(ClientGroupType::class, new ClientGroupType());
        $this->assertInstanceOf(ClientGroupType::class, $clientGroupType);
        $this->assertEquals($data, $clientGroupType->toArray());
    }
}
