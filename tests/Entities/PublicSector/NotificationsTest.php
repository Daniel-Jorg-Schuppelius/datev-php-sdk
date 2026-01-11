<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Notifications\Notifications;
use Datev\Entities\PublicSector\Notifications\Notification;

class NotificationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "not-1", "number" => "2024-001", "state" => "sent", "type" => "billing"],
                ["id" => "not-2", "number" => "2024-002", "state" => "pending", "type" => "reminder"]
            ]
        ];
        $collection = new Notifications($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Notification::class, $collection->getValues()[0]);
    }
}
