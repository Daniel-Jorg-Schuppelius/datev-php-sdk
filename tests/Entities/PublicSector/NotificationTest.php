<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NotificationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Notifications\{Notification, Notifications};
use Tests\Contracts\EntityTest;

class NotificationTest extends EntityTest {
    public function test_create_notification() {
        $data = [
            "id" => "n1234567-8901-2345-6789-012345678901",
            "number" => "2024-001",
            "date" => "2024-01-15T00:00:00.000+00:00",
            "state" => "sent",
            "type" => "billing",
            "fee_type_list" => "water,sewage",
        ];

        $notification = new Notification($data);
        $this->assertInstanceOf(Notification::class, new Notification);
        $this->assertInstanceOf(Notification::class, $notification);
        $this->assertEquals("2024-001", $notification->getNumber());
        $this->assertEquals("sent", $notification->getState());
        $this->assertEquals("billing", $notification->getType());
    }

    public function test_create_notifications() {
        $data = [
            "content" => [
                [
                    "id" => "n1234567-8901-2345-6789-012345678901",
                    "number" => "2024-001",
                ],
                [
                    "id" => "n2234567-8901-2345-6789-012345678902",
                    "number" => "2024-002",
                ],
            ],
        ];

        $notifications = new Notifications($data);
        $this->assertInstanceOf(Notifications::class, $notifications);
        $this->assertCount(2, $notifications->getValues());
    }
}
