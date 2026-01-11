<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\ClientGroups\ClientGroup;
use Datev\Entities\OrderManagement\ClientGroups\ClientGroups;

class ClientGroupTest extends EntityTest {
    
    public function testCreateClientGroup(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "client_id" => "660e8400-e29b-41d4-a716-446655440001",
            "client_number" => "10001",
            "client_name" => "Test GmbH",
            "group_id" => "770e8400-e29b-41d4-a716-446655440002",
            "group_number" => "1",
            "group_name" => "Hauptgruppe"
        ];

        $clientGroup = new ClientGroup($data);

        $this->assertInstanceOf(ClientGroup::class, $clientGroup);
        $this->assertNotNull($clientGroup->getID());
        $this->assertEquals("10001", $clientGroup->getClientNumber());
        $this->assertEquals("Test GmbH", $clientGroup->getClientName());
        $this->assertEquals("Hauptgruppe", $clientGroup->getGroupName());
    }

    public function testCreateClientGroups(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "client_number" => "10001",
                    "client_name" => "Test GmbH"
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "client_number" => "10002",
                    "client_name" => "Beispiel AG"
                ]
            ]
        ];

        $clientGroups = new ClientGroups($data);

        $this->assertInstanceOf(ClientGroups::class, $clientGroups);
        $this->assertCount(2, $clientGroups);
    }
}
