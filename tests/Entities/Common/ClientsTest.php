<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\Clients\Clients;
use Datev\Entities\Common\Clients\Client;

class ClientsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "client-1",
                    "name" => "Test Client 1",
                    "number" => 10001
                ],
                [
                    "id" => "client-2",
                    "name" => "Test Client 2",
                    "number" => 10002
                ]
            ]
        ];

        $clients = new Clients($data);

        $this->assertCount(2, $clients->getValues());
        $this->assertInstanceOf(Client::class, $clients->getValues()[0]);
        $this->assertEquals("Test Client 1", $clients->getValues()[0]->getName());
        $this->assertEquals(10001, $clients->getValues()[0]->getNumber());
    }
}
