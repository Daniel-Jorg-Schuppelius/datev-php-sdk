<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateMADTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStatesMAD\{FederalStateMAD, FederalStatesMAD};
use Tests\Contracts\EntityTest;

class FederalStateMADTest extends EntityTest {
    public function test_create_federal_state_mad(): void {
        $data = [
            "value" => "BY",
            "valid_from" => "2020-01-01",
        ];

        $federalStateMAD = new FederalStateMAD($data);
        $this->assertInstanceOf(FederalStateMAD::class, $federalStateMAD);
    }

    public function test_create_federal_states_mad(): void {
        $data = [
            [
                "value" => "BY",
                "valid_from" => "2020-01-01",
            ],
            [
                "value" => "BW",
                "valid_from" => "2021-01-01",
            ],
        ];

        $federalStatesMAD = new FederalStatesMAD($data);
        $this->assertInstanceOf(FederalStatesMAD::class, $federalStatesMAD);
        $this->assertCount(2, $federalStatesMAD->getValues());
    }
}
