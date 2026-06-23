<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalMessagesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\AdditionalMessages\{AdditionalMessage, AdditionalMessages};
use Tests\Contracts\EntityTest;

class AdditionalMessagesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "msg-1",
                    "description" => "Processing completed",
                    "severity" => "info",
                ],
                [
                    "id" => "msg-2",
                    "description" => "Deprecated field used",
                    "severity" => "warning",
                ],
            ],
        ];

        $messages = new AdditionalMessages($data);

        $this->assertCount(2, $messages->getValues());
        $this->assertInstanceOf(AdditionalMessage::class, $messages->getValues()[0]);
    }
}
