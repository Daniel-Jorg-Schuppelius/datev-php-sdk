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

use Datev\Entities\ClientMasterData\Denominations\Denomination;
use Datev\Entities\ClientMasterData\Denominations\Denominations;
use PHPUnit\Framework\TestCase;

class DenominationTest extends TestCase {
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
