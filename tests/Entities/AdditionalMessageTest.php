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

namespace Tests\Entities;

use Datev\Entities\Common\AdditionalMessages\AdditionalMessage;
use Tests\Contracts\EntityTest;

class AdditionalMessageTest extends EntityTest {
    public function test_create_additional_message(): void {
        $data = [
            "id" => "abc",
            "description" => "abc",
            "help_uri" => "abc",
            "severity" => "error",
        ];

        $additionalMessage = new AdditionalMessage($data);
        $this->assertTrue($additionalMessage->isValid());
        $additionalMessage = new AdditionalMessage($data);
        $this->assertInstanceOf(AdditionalMessage::class, new AdditionalMessage);
        $this->assertInstanceOf(AdditionalMessage::class, $additionalMessage);
        $this->assertEquals($data, $additionalMessage->toArray());
    }
}
