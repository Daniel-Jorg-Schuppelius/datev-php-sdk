<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Clients\{Client, Clients};
use Tests\Contracts\EntityTest;

class ClientTest extends EntityTest {
    public function test_create_client() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "client_number" => "10001",
            "client_name" => "Mustermann GmbH",
            "isactive" => true,
        ];

        $client = new Client($data);
        $this->assertInstanceOf(Client::class, new Client);
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals("10001", $client->getClientNumber());
        $this->assertEquals("Mustermann GmbH", $client->getClientName());
        $this->assertTrue($client->isActive());
    }

    public function test_create_clients() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "client_name" => "Kunde 1",
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "client_name" => "Kunde 2",
                ],
            ],
        ];

        $clients = new Clients($data);
        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertCount(2, $clients->getValues());
    }
}
