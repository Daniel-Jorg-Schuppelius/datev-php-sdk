<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\CostCenters\CostCenter;
use Datev\Entities\OrderManagement\CostCenters\CostCenters;

class CostCenterTest extends EntityTest {
    
    public function testCreateCostCenter(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "cost_center_number" => "1000",
            "cost_center_name" => "Verwaltung",
            "organization_id" => "660e8400-e29b-41d4-a716-446655440001",
            "isactive" => true
        ];

        $costCenter = new CostCenter($data);

        $this->assertInstanceOf(CostCenter::class, $costCenter);
        $this->assertNotNull($costCenter->getID());
        $this->assertEquals("1000", $costCenter->getCostCenterNumber());
        $this->assertEquals("Verwaltung", $costCenter->getCostCenterName());
        $this->assertTrue($costCenter->isActive());
    }

    public function testCreateCostCenters(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "cost_center_number" => "1000",
                    "cost_center_name" => "Verwaltung"
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "cost_center_number" => "2000",
                    "cost_center_name" => "Produktion"
                ]
            ]
        ];

        $costCenters = new CostCenters($data);

        $this->assertInstanceOf(CostCenters::class, $costCenters);
        $this->assertCount(2, $costCenters);
    }
}
