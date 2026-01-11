<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Clients\Client;
use Datev\Entities\Accounting\Clients\Clients;

class ClientTest extends EntityTest {
    public function testCreateClient() {
        $data = [
            "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
            "name" => "Test Client",
            "number" => 12345
        ];        $client = new Client($data);

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals("Test Client", $client->getName());
        $this->assertEquals(12345, $client->getNumber());
        $this->assertNotNull($client->getID());
    }

    public function testCreateClients() {
        $data = [
            "content" => [
                [
                    "id" => "a1b2c3d4-e5f6-7890-abcd-ef1234567890",
                    "name" => "Client One",
                    "number" => 10001
                ],
                [
                    "id" => "b2c3d4e5-f6a7-8901-bcde-f12345678901",
                    "name" => "Client Two",
                    "number" => 10002
                ]
            ]
        ];        $clients = new Clients($data);

        $this->assertInstanceOf(Clients::class, $clients);
        $this->assertCount(2, $clients->getValues());
    }
}
