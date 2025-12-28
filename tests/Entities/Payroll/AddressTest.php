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

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Addresses\Address;
use Datev\Entities\Payroll\Addresses\Addresses;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase {
    public function testCreateAddress(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "addr-001",
            "street" => "Musterstraße",
            "house_number" => "123",
            "city" => "München",
            "postal_code" => "80331",
            "country" => "Deutschland"
        ];

        $address = new Address($data, $logger);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals("addr-001", $address->getID()->getValue());
        $this->assertEquals("Musterstraße", $address->getStreet());
        $this->assertEquals("München", $address->getCity());
        $this->assertEquals("80331", $address->getPostalCode());
    }

    public function testCreateAddresses(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "addr-001",
                    "street" => "Musterstraße",
                    "city" => "München"
                ],
                [
                    "id" => "addr-002",
                    "street" => "Beispielweg",
                    "city" => "Berlin"
                ]
            ]
        ];

        $addresses = new Addresses($data, $logger);

        $this->assertInstanceOf(Addresses::class, $addresses);
        $this->assertCount(2, $addresses);
        $this->assertInstanceOf(Address::class, $addresses->getValues()[0]);
    }
}
