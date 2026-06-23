<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionCommunications\{TransactionCommunication, TransactionCommunications};
use Tests\Contracts\EntityTest;

class TransactionCommunicationsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "notification_e_mail" => "test1@example.com"],
                ["id" => 2, "status" => "pending", "notification_e_mail" => "test2@example.com"],
            ],
        ];
        $collection = new TransactionCommunications($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionCommunication::class, $collection->getValues()[0]);
    }
}
