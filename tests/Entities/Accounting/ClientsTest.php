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

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Clients\Clients;
use Datev\Entities\Accounting\Clients\Client;

class ClientsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "client-acc-1",
                    "name" => "Accounting Client 1",
                    "number" => 20001
                ],
                [
                    "id" => "client-acc-2",
                    "name" => "Accounting Client 2",
                    "number" => 20002
                ]
            ]
        ];

        $clients = new Clients($data);

        $this->assertCount(2, $clients->getValues());
        $this->assertInstanceOf(Client::class, $clients->getValues()[0]);
    }
}
