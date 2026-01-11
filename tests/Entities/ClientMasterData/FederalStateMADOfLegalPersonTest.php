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

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\FederalStatesMAD\FederalStateMADOfLegalPerson;

class FederalStateMADOfLegalPersonTest extends EntityTest {
    public function testCreateFromString(): void {
        $federalState = new FederalStateMADOfLegalPerson("BY");

        $this->assertEquals("BY", $federalState->getValue());
        $this->assertEquals('current_federal_state_mad_of_legal_person', $federalState->getEntityName());
    }
}
