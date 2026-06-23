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

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Clients\{Client, Clients};
use Tests\Contracts\EntityTest;

class ClientsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "om-client-1",
                    "name" => "Order Management Client 1",
                    "number" => 50001,
                ],
                [
                    "id" => "om-client-2",
                    "name" => "Order Management Client 2",
                    "number" => 50002,
                ],
            ],
        ];

        $clients = new Clients($data);

        $this->assertCount(2, $clients->getValues());
        $this->assertInstanceOf(Client::class, $clients->getValues()[0]);
    }
}
