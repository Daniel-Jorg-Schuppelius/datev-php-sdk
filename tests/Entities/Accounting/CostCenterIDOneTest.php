<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterIDOneTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenters\ID\CostCenterIDOne;
use Tests\Contracts\EntityTest;

class CostCenterIDOneTest extends EntityTest {
    public function test_create_from_integer(): void {
        $costCenterId = new CostCenterIDOne(100);

        $this->assertEquals(100, $costCenterId->getValue());
        $this->assertEquals('kost1_cost_center_id', $costCenterId->getEntityName());
    }

    public function test_create_from_string(): void {
        $costCenterId = new CostCenterIDOne("CC001");

        $this->assertEquals("CC001", $costCenterId->getValue());
    }
}
