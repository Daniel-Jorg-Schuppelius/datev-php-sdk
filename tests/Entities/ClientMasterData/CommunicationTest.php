<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CommunicationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Communications\Communication;

class CommunicationTest extends EntityTest {
    public function testCreateCommunication() {
        $data = [
            "id" => "20b9d6d9-117b-4555-b0b0-3659eb0279d9",
            "type" => "phone",
            "data_content" => "+49 8721 123456",
            "number_standardized" => "00498721123456",
            "note" => "ab 9 Uhr",
            "is_main_communication" => true,
            "is_management_phone" => true
        ];

        $communication = new Communication($data);
        $this->assertTrue($communication->isValid());
        $this->assertInstanceOf(Communication::class, new Communication());
        $this->assertInstanceOf(Communication::class, $communication);
        $this->assertEquals($data, $communication->toArray());
    }
}
