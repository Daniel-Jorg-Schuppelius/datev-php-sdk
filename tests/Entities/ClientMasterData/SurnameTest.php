<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SurnameTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Surnames\Surname;
use Datev\Entities\ClientMasterData\Surnames\Surnames;

class SurnameTest extends EntityTest {
    public function testCreateSurname() {
        $data = [
            "value" => "Mustermann",
            "valid_from" => "2024-01-01"
        ];

        $surname = new Surname($data);
        $this->assertInstanceOf(Surname::class, $surname);
    }

    public function testCreateSurnames() {
        $data = [
            [
                "value" => "Mustermann",
                "valid_from" => "2024-01-01"
            ]
        ];

        $surnames = new Surnames($data);
        $this->assertInstanceOf(Surnames::class, $surnames);
    }
}
