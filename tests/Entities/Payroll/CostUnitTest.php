<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostUnitTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\CostUnits\{CostUnit, CostUnits};
use Tests\Contracts\EntityTest;

class CostUnitTest extends EntityTest {
    public function test_create_cost_unit() {
        $data = [
            "id" => "A001",
            "name" => "Projekt Alpha",
        ];
        $costUnit = new CostUnit($data);

        $this->assertInstanceOf(CostUnit::class, $costUnit);
        $this->assertEquals("Projekt Alpha", $costUnit->getName());
    }

    public function test_create_cost_units() {
        $data = [
            "content" => [
                [
                    "id" => "A001",
                    "name" => "Projekt Alpha",
                ],
                [
                    "id" => "B002",
                    "name" => "Projekt Beta",
                ],
            ],
        ];
        $costUnits = new CostUnits($data);

        $this->assertInstanceOf(CostUnits::class, $costUnits);
        $this->assertCount(2, $costUnits->getValues());
    }
}
