<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistrations;
use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistration;

class TransactionRegistrationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "notification_e_mail" => "test1@example.com"],
                ["id" => 2, "status" => "pending", "notification_e_mail" => "test2@example.com"]
            ]
        ];
        $collection = new TransactionRegistrations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionRegistration::class, $collection->getValues()[0]);
    }
}
