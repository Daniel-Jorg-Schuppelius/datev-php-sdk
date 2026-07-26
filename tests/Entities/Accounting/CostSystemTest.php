<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostSystemTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostSystems\{CostSystem, CostSystems};
use Tests\Contracts\EntityTest;

class CostSystemTest extends EntityTest {
    public function test_create_cost_system(): void {
        $data = [
            "id" => 1,
            "caption" => "Standard-Kostenrechnung",
            "cost_system_type" => "standard",
            "cost_length" => 5,
            "is_active" => true,
        ];

        $costSystem = new CostSystem($data);
        $this->assertInstanceOf(CostSystem::class, new CostSystem);
        $this->assertInstanceOf(CostSystem::class, $costSystem);
        $this->assertEquals("Standard-Kostenrechnung", $costSystem->getCaption());
        $this->assertEquals("standard", $costSystem->getCostSystemType());
        $this->assertSame(5, $costSystem->getCostLength());
        $this->assertTrue($costSystem->isActive());
    }

    public function test_create_cost_systems(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "caption" => "KoRe 1",
                    "is_active" => true,
                ],
                [
                    "id" => 2,
                    "caption" => "KoRe 2",
                    "is_active" => false,
                ],
            ],
        ];

        $costSystems = new CostSystems($data);
        $this->assertInstanceOf(CostSystems::class, $costSystems);
        $this->assertCount(2, $costSystems->getValues());
    }
}
