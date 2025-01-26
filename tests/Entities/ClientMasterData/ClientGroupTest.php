<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use ERRORToolkit\Logger\ConsoleLogger;;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\ClientGroups\ClientGroup;
use PHPUnit\Framework\TestCase;

class ClientGroupTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateClientGroup() {
        $data = [
            "id" => "a97c9c3e-380c-494e-47c8-d12fff738132",
            "client_group_type_id" => "a53f9c3e-480c-494e-47c8-d12fff738188",
            "client_group_type_short_name" => "RG A",
            "client_id" => "f23f9c3c-380c-494e-97c8-d12fff738189",
            "client_name" => "Mustermeier GmbH",
            "client_number" => 10000,
            "client_status" => "active",
            "timestamp" => "2021-05-31T00:00:00.000+00:00"
        ];

        $clientGroup = new ClientGroup($data, $this->logger);
        $this->assertTrue($clientGroup->isValid());
        $this->assertInstanceOf(ClientGroup::class, new ClientGroup());
        $this->assertInstanceOf(ClientGroup::class, $clientGroup);
        $this->assertEquals($data, $clientGroup->toArray());
    }
}
