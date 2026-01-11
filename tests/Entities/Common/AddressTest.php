<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\Addresses\Address;
use Datev\Entities\Common\Addresses\Addresses;
use Datev\Entities\Common\Addresses\AddressID;

class AddressTest extends EntityTest {
    public function testCreateAddress(): void {
        $data = [
            "id" => "addr-001",
            "street" => "Musterstraße 123",
            "city" => "München",
            "postal_code" => "80331"
        ];

        $address = new Address($data);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertInstanceOf(AddressID::class, $address->getID());
        $this->assertEquals("addr-001", $address->getID()->getValue());
        $this->assertEquals("Musterstraße 123", $address->getStreet());
        $this->assertEquals("München", $address->getCity());
        $this->assertEquals("80331", $address->getPostalCode());
        $this->assertEquals("Musterstraße 123, 80331 München", $address->getFullAddress());
    }

    public function testCreateAddresses(): void {
        $data = [
            "content" => [
                [
                    "id" => "addr-001",
                    "street" => "Musterstraße 123",
                    "city" => "München",
                    "postal_code" => "80331"
                ],
                [
                    "id" => "addr-002",
                    "street" => "Beispielweg 45",
                    "city" => "Berlin",
                    "postal_code" => "10115"
                ]
            ]
        ];

        $addresses = new Addresses($data);

        $this->assertInstanceOf(Addresses::class, $addresses);
        $this->assertCount(2, $addresses);
        $this->assertInstanceOf(Address::class, $addresses->getValues()[0]);
    }
}
