<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DenominationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Denominations\Denomination;
use Datev\Entities\ClientMasterData\Denominations\Denominations;

class DenominationTest extends EntityTest {
    public function testCreateDenomination() {
        $data = [
            "value" => "Evangelisch",
            "valid_from" => "2024-01-01"
        ];

        $denomination = new Denomination($data);
        $this->assertInstanceOf(Denomination::class, $denomination);
    }

    public function testCreateDenominations() {
        $data = [
            [
                "value" => "Evangelisch",
                "valid_from" => "2024-01-01"
            ]
        ];

        $denominations = new Denominations($data);
        $this->assertInstanceOf(Denominations::class, $denominations);
    }
}
