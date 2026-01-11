<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SelfClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\SelfClients\SelfClient;
use Datev\Entities\OrderManagement\SelfClients\SelfClients;

class SelfClientTest extends EntityTest {
    
    public function testCreateSelfClient(): void {
        $data = [
            "id" => "test-id",
            "client_id" => "550e8400-e29b-41d4-a716-446655440000",
            "client_number" => 10001,
            "client_name" => "Eigene Kanzlei GmbH"
        ];

        $selfClient = new SelfClient($data);

        $this->assertInstanceOf(SelfClient::class, $selfClient);
        $this->assertEquals(10001, $selfClient->getClientNumber());
        $this->assertEquals("Eigene Kanzlei GmbH", $selfClient->getClientName());
    }

    public function testCreateSelfClients(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "client_number" => 10001,
                    "client_name" => "Eigene Kanzlei GmbH"
                ],
                [
                    "id" => "test-id-2",
                    "client_number" => 10002,
                    "client_name" => "Zweite Niederlassung"
                ]
            ]
        ];

        $selfClients = new SelfClients($data);

        $this->assertInstanceOf(SelfClients::class, $selfClients);
        $this->assertCount(2, $selfClients);
    }
}
