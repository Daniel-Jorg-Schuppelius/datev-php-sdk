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

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\CostUnits\CostUnit;
use Datev\Entities\Payroll\CostUnits\CostUnits;

class CostUnitTest extends EntityTest {
    public function testCreateCostUnit() {
        $data = [
            "id" => "A001",
            "name" => "Projekt Alpha"
        ];        $costUnit = new CostUnit($data);

        $this->assertInstanceOf(CostUnit::class, $costUnit);
        $this->assertEquals("Projekt Alpha", $costUnit->getName());
    }

    public function testCreateCostUnits() {
        $data = [
            "content" => [
                [
                    "id" => "A001",
                    "name" => "Projekt Alpha"
                ],
                [
                    "id" => "B002",
                    "name" => "Projekt Beta"
                ]
            ]
        ];        $costUnits = new CostUnits($data);

        $this->assertInstanceOf(CostUnits::class, $costUnits);
        $this->assertCount(2, $costUnits->getValues());
    }
}
