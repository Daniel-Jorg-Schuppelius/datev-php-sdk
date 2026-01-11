<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeePlanTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\FeePlans\FeePlan;
use Datev\Entities\OrderManagement\FeePlans\FeePlans;

class FeePlanTest extends EntityTest {
    
    public function testCreateFeePlan(): void {
        $data = [
            "id" => "test-id",
            "fee_plan_number" => 1,
            "fee_plan_name" => "Standardgebührenplan",
            "fee_plan_date_from" => "2024-01-01",
            "fee_plan_date_to" => "2024-12-31",
            "fee_plan_active" => true
        ];

        $feePlan = new FeePlan($data);

        $this->assertInstanceOf(FeePlan::class, $feePlan);
        $this->assertEquals(1, $feePlan->getFeePlanNumber());
        $this->assertEquals("Standardgebührenplan", $feePlan->getFeePlanName());
    }

    public function testCreateFeePlans(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "fee_plan_number" => 1,
                    "fee_plan_name" => "Plan A"
                ],
                [
                    "id" => "test-id-2",
                    "fee_plan_number" => 2,
                    "fee_plan_name" => "Plan B"
                ]
            ]
        ];

        $feePlans = new FeePlans($data);

        $this->assertInstanceOf(FeePlans::class, $feePlans);
        $this->assertCount(2, $feePlans);
    }
}
