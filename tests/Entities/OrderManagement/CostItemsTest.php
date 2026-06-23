<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\CostItems\{CostItem, CostItems};
use Tests\Contracts\EntityTest;

class CostItemsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ci-1", "cost_position" => "CP001", "cost_position_name" => "Cost Item 1"],
                ["id" => "ci-2", "cost_position" => "CP002", "cost_position_name" => "Cost Item 2"],
            ],
        ];
        $collection = new CostItems($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostItem::class, $collection->getValues()[0]);
    }
}
