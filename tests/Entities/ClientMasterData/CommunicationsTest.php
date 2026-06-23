<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CommunicationsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Communications\{Communication, Communications};
use Tests\Contracts\EntityTest;

class CommunicationsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "type" => "phone",
                    "data_content" => "+49 89 12345678",
                ],
                [
                    "type" => "phone",
                    "data_content" => "+49 30 98765432",
                ],
            ],
        ];

        $communications = new Communications($data);

        $this->assertCount(2, $communications->getValues());
        $this->assertInstanceOf(Communication::class, $communications->getValues()[0]);
    }
}
