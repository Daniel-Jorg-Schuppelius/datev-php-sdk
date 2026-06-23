<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\OrderTypes\{OrderType, OrderTypes};
use Tests\Contracts\EntityTest;

class OrderTypesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ot-1", "ordertype" => "STD", "ordertype_name" => "Standard Order"],
                ["id" => "ot-2", "ordertype" => "EXP", "ordertype_name" => "Express Order"],
            ],
        ];
        $collection = new OrderTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(OrderType::class, $collection->getValues()[0]);
    }
}
