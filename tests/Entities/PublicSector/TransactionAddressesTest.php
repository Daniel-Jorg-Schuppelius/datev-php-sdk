<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddresses;
use Datev\Entities\PublicSector\TransactionAddresses\TransactionAddress;

class TransactionAddressesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "notification_e_mail" => "test1@example.com"],
                ["id" => 2, "status" => "pending", "notification_e_mail" => "test2@example.com"]
            ]
        ];
        $collection = new TransactionAddresses($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionAddress::class, $collection->getValues()[0]);
    }
}
