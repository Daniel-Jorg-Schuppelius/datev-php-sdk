<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FederalStateMADOfLegalPersonTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStatesMAD\FederalStateMADOfLegalPerson;
use Tests\Contracts\EntityTest;

class FederalStateMADOfLegalPersonTest extends EntityTest {
    public function test_create_from_string(): void {
        $federalState = new FederalStateMADOfLegalPerson("BY");

        $this->assertEquals("BY", $federalState->getValue());
        $this->assertEquals('current_federal_state_mad_of_legal_person', $federalState->getEntityName());
    }
}
