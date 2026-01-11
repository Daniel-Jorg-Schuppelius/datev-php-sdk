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

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Clients\Clients;
use Datev\Entities\ClientMasterData\Clients\Client;

class ClientsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "md-client-1",
                    "name" => "Master Data Client 1",
                    "number" => 30001
                ],
                [
                    "id" => "md-client-2",
                    "name" => "Master Data Client 2",
                    "number" => 30002
                ]
            ]
        ];

        $clients = new Clients($data);

        $this->assertCount(2, $clients->getValues());
        $this->assertInstanceOf(Client::class, $clients->getValues()[0]);
    }
}
