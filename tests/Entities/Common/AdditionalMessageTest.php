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

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\AdditionalMessages\AdditionalMessage;
use Datev\Entities\Common\AdditionalMessages\AdditionalMessageID;
use Datev\Entities\Common\AdditionalMessages\AdditionalMessages;

class AdditionalMessageTest extends EntityTest {
    public function testCreateAdditionalMessageID() {
        $id = new AdditionalMessageID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(AdditionalMessageID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function testCreateAdditionalMessage() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "description" => "Test message",
            "severity" => "info"
        ];

        $message = new AdditionalMessage($data);
        $this->assertInstanceOf(AdditionalMessage::class, $message);
    }

    public function testCreateAdditionalMessages() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "description" => "Test message"
            ]
        ];

        $messages = new AdditionalMessages($data);
        $this->assertInstanceOf(AdditionalMessages::class, $messages);
    }
}
