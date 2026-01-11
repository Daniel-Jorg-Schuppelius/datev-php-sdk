<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunications;
use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunication;

class TransactionCommunicationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "notification_e_mail" => "test1@example.com"],
                ["id" => 2, "status" => "pending", "notification_e_mail" => "test2@example.com"]
            ]
        ];
        $collection = new TransactionCommunications($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionCommunication::class, $collection->getValues()[0]);
    }
}
