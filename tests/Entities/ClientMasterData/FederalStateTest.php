<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\FederalStates\FederalState;
use Datev\Entities\ClientMasterData\FederalStates\FederalStates;

class FederalStateTest extends EntityTest {
    public function testCreateFederalState() {
        $data = [
            "value" => "BY",
            "valid_from" => "2024-01-01"
        ];

        $state = new FederalState($data);
        $this->assertInstanceOf(FederalState::class, $state);
    }

    public function testCreateFederalStates() {
        $data = [
            [
                "value" => "BY",
                "valid_from" => "2024-01-01"
            ]
        ];

        $states = new FederalStates($data);
        $this->assertInstanceOf(FederalStates::class, $states);
    }
}
