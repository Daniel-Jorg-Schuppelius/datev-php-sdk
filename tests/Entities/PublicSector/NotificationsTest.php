<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Notifications\{Notification, Notifications};
use Tests\Contracts\EntityTest;

class NotificationsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "not-1", "number" => "2024-001", "state" => "sent", "type" => "billing"],
                ["id" => "not-2", "number" => "2024-002", "state" => "pending", "type" => "reminder"],
            ],
        ];
        $collection = new Notifications($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Notification::class, $collection->getValues()[0]);
    }
}
