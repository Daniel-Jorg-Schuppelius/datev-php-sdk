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

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\Addresses\Addresses;
use Datev\Entities\Common\Addresses\Address;

class AddressesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "street" => "Musterstraße 1",
                    "city" => "München",
                    "postal_code" => "80331"
                ],
                [
                    "street" => "Testweg 42",
                    "city" => "Berlin",
                    "postal_code" => "10115"
                ]
            ]
        ];

        $addresses = new Addresses($data);

        $this->assertCount(2, $addresses->getValues());
        $this->assertInstanceOf(Address::class, $addresses->getValues()[0]);
    }
}
