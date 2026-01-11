<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionAddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddress;
use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddresses;

class TransactionAddressTest extends EntityTest {
    public function testCreateTransactionAddress() {
        $data = [
            "id" => 12345,
            "status" => "active",
            "notification_e_mail" => "test@example.com"
        ];

        $address = new TransactionAddress($data);
        $this->assertInstanceOf(TransactionAddress::class, new TransactionAddress());
        $this->assertInstanceOf(TransactionAddress::class, $address);
        $this->assertEquals(12345, $address->getID());
        $this->assertEquals("active", $address->getStatus());
        $this->assertEquals("test@example.com", $address->getNotificationEmail());
    }

    public function testCreateTransactionAddresses() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "active"
                ],
                [
                    "id" => 2,
                    "status" => "inactive"
                ]
            ]
        ];

        $addresses = new TransactionAddresses($data);
        $this->assertInstanceOf(TransactionAddresses::class, $addresses);
        $this->assertCount(2, $addresses->getValues());
    }
}
