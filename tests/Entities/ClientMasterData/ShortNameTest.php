<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ShortNameTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\ShortNames\ShortName;
use Datev\Entities\ClientMasterData\ShortNames\ShortNames;

class ShortNameTest extends EntityTest {
    public function testCreateShortName() {
        $data = [
            "value" => "MUSTER",
            "valid_from" => "2024-01-01"
        ];

        $name = new ShortName($data);
        $this->assertInstanceOf(ShortName::class, $name);
    }

    public function testCreateShortNames() {
        $data = [
            [
                "value" => "MUSTER",
                "valid_from" => "2024-01-01"
            ]
        ];

        $names = new ShortNames($data);
        $this->assertInstanceOf(ShortNames::class, $names);
    }
}
