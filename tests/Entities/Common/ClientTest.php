<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\Clients\{Client, ClientID, Clients};
use Tests\Contracts\EntityTest;

class ClientTest extends EntityTest {
    public function test_create_client_id() {
        $id = new ClientID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(ClientID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function test_create_client() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "name" => "Muster GmbH",
            "number" => 10001,
        ];

        $client = new Client($data);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function test_create_clients() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "name" => "Muster GmbH",
                "number" => 10001,
            ],
        ];

        $clients = new Clients($data);
        $this->assertInstanceOf(Clients::class, $clients);
    }
}
