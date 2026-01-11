<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterIDTwoTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostCenters\ID\CostCenterIDTwo;

class CostCenterIDTwoTest extends EntityTest {
    public function testCreateFromInteger(): void {
        $costCenterId = new CostCenterIDTwo(300);

        $this->assertEquals(300, $costCenterId->getValue());
        $this->assertEquals('kost2_cost_center_id', $costCenterId->getEntityName());
    }

    public function testCreateFromString(): void {
        $costCenterId = new CostCenterIDTwo("CC002");

        $this->assertEquals("CC002", $costCenterId->getValue());
    }
}
