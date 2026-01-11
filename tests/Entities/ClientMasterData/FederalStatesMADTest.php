<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStatesMADTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\FederalStatesMAD\FederalStatesMAD;
use Datev\Entities\ClientMasterData\FederalStatesMAD\FederalStateMAD;

class FederalStatesMADTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_federal_state_mad" => "BY"],
                ["current_federal_state_mad" => "NW"]
            ]
        ];

        $states = new FederalStatesMAD($data);

        $this->assertCount(2, $states->getValues());
        $this->assertInstanceOf(FederalStateMAD::class, $states->getValues()[0]);
    }
}
