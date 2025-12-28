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

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\PublicSector\Notifications\Notification;
use Datev\Entities\PublicSector\Notifications\Notifications;
use PHPUnit\Framework\TestCase;

class NotificationTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateNotification() {
        $data = [
            "id" => "n1234567-8901-2345-6789-012345678901",
            "number" => "2024-001",
            "date" => "2024-01-15T00:00:00.000+00:00",
            "state" => "sent",
            "type" => "billing",
            "fee_type_list" => "water,sewage"
        ];

        $notification = new Notification($data, $this->logger);
        $this->assertInstanceOf(Notification::class, new Notification());
        $this->assertInstanceOf(Notification::class, $notification);
        $this->assertEquals("2024-001", $notification->getNumber());
        $this->assertEquals("sent", $notification->getState());
        $this->assertEquals("billing", $notification->getType());
    }

    public function testCreateNotifications() {
        $data = [
            "content" => [
                [
                    "id" => "n1234567-8901-2345-6789-012345678901",
                    "number" => "2024-001"
                ],
                [
                    "id" => "n2234567-8901-2345-6789-012345678902",
                    "number" => "2024-002"
                ]
            ]
        ];

        $notifications = new Notifications($data, $this->logger);
        $this->assertInstanceOf(Notifications::class, $notifications);
        $this->assertCount(2, $notifications->getValues());
    }
}
