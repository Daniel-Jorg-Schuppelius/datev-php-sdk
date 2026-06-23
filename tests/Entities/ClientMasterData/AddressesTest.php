<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddressesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Addresses\{Address, Addresses};
use Tests\Contracts\EntityTest;

class AddressesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "addr-1",
                    "street" => "Hauptstraße 1",
                    "city" => "Stuttgart",
                ],
                [
                    "id" => "addr-2",
                    "street" => "Nebenweg 5",
                    "city" => "Hamburg",
                ],
            ],
        ];

        $addresses = new Addresses($data);

        $this->assertCount(2, $addresses->getValues());
        $this->assertInstanceOf(Address::class, $addresses->getValues()[0]);
    }
}
