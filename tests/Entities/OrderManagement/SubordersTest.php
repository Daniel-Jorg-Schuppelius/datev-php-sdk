<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\Suborders\Suborders;
use Datev\Entities\OrderManagement\Suborders\Suborder;

class SubordersTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["suborder_id" => 1, "order_id" => 101, "suborder_name" => "Suborder 1"],
                ["suborder_id" => 2, "order_id" => 101, "suborder_name" => "Suborder 2"]
            ]
        ];
        $collection = new Suborders($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Suborder::class, $collection->getValues()[0]);
    }
}
