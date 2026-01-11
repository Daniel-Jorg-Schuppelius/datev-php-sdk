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

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Clients\Clients;
use Datev\Entities\Payroll\Clients\Client;

class ClientsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "45200",
                    "consultant_number" => 12345
                ],
                [
                    "id" => "45201",
                    "consultant_number" => 67890
                ]
            ]
        ];

        $clients = new Clients($data);

        $this->assertCount(2, $clients->getValues());
        $this->assertInstanceOf(Client::class, $clients->getValues()[0]);
    }
}
