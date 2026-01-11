<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateOfNaturalPersonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\FederalStates\FederalStateOfNaturalPerson;

class FederalStateOfNaturalPersonTest extends EntityTest {
    public function testCreateFederalStateOfNaturalPerson(): void {
        $data = [
            "id" => "BY",
            "name" => "Bayern"
        ];

        $state = new FederalStateOfNaturalPerson($data);

        $this->assertInstanceOf(FederalStateOfNaturalPerson::class, $state);
    }
}
