<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\CostCenters\{CostCenter, CostCenters};
use Tests\Contracts\EntityTest;

class CostCentersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cc-1", "cost_center_number" => "100", "cost_center_name" => "Cost Center 1"],
                ["id" => "cc-2", "cost_center_number" => "200", "cost_center_name" => "Cost Center 2"],
            ],
        ];
        $collection = new CostCenters($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostCenter::class, $collection->getValues()[0]);
    }
}
