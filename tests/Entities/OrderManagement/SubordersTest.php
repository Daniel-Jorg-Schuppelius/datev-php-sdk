<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Suborders\{Suborder, Suborders};
use Tests\Contracts\EntityTest;

class SubordersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["suborder_id" => 1, "order_id" => 101, "suborder_name" => "Suborder 1"],
                ["suborder_id" => 2, "order_id" => 101, "suborder_name" => "Suborder 2"],
            ],
        ];
        $collection = new Suborders($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Suborder::class, $collection->getValues()[0]);
    }
}
