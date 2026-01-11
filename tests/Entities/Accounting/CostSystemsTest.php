<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostSystems\CostSystems;
use Datev\Entities\Accounting\CostSystems\CostSystem;

class CostSystemsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sys-1", "caption" => "Kostenstellen", "cost_system_type" => "cost_center", "is_active" => true],
                ["id" => "sys-2", "caption" => "Kostenträger", "cost_system_type" => "cost_unit", "is_active" => true]
            ]
        ];
        $collection = new CostSystems($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostSystem::class, $collection->getValues()[0]);
    }
}
