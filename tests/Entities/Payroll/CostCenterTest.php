<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\CostCenters\CostCenter;
use Datev\Entities\Payroll\CostCenters\CostCenters;

class CostCenterTest extends EntityTest {
    public function testCreateCostCenter() {
        $data = [
            "id" => "100",
            "name" => "Verwaltung"
        ];        $costCenter = new CostCenter($data);

        $this->assertInstanceOf(CostCenter::class, $costCenter);
        $this->assertEquals("Verwaltung", $costCenter->getName());
    }

    public function testCreateCostCenters() {
        $data = [
            "content" => [
                [
                    "id" => "100",
                    "name" => "Verwaltung"
                ],
                [
                    "id" => "200",
                    "name" => "Produktion"
                ]
            ]
        ];        $costCenters = new CostCenters($data);

        $this->assertInstanceOf(CostCenters::class, $costCenters);
        $this->assertCount(2, $costCenters->getValues());
    }
}
