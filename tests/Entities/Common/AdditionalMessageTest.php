<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalMessageTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\AdditionalMessages\{AdditionalMessage, AdditionalMessageID, AdditionalMessages};
use Tests\Contracts\EntityTest;

class AdditionalMessageTest extends EntityTest {
    public function test_create_additional_message_id() {
        $id = new AdditionalMessageID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(AdditionalMessageID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function test_create_additional_message() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "description" => "Test message",
            "severity" => "info",
        ];

        $message = new AdditionalMessage($data);
        $this->assertInstanceOf(AdditionalMessage::class, $message);
    }

    public function test_create_additional_messages() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "description" => "Test message",
            ],
        ];

        $messages = new AdditionalMessages($data);
        $this->assertInstanceOf(AdditionalMessages::class, $messages);
    }
}
