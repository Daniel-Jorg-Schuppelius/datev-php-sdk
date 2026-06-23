<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateOfLegalPersonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStates\FederalStateOfLegalPerson;
use Tests\Contracts\EntityTest;

class FederalStateOfLegalPersonTest extends EntityTest {
    public function test_create_federal_state_of_legal_person(): void {
        $data = [
            "id" => "NW",
            "name" => "Nordrhein-Westfalen",
        ];

        $state = new FederalStateOfLegalPerson($data);

        $this->assertInstanceOf(FederalStateOfLegalPerson::class, $state);
    }
}
