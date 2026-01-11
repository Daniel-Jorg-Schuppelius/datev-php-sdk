<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\OrderTypes\OrderTypes;
use Datev\Entities\OrderManagement\OrderTypes\OrderType;

class OrderTypesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ot-1", "ordertype" => "STD", "ordertype_name" => "Standard Order"],
                ["id" => "ot-2", "ordertype" => "EXP", "ordertype_name" => "Express Order"]
            ]
        ];
        $collection = new OrderTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(OrderType::class, $collection->getValues()[0]);
    }
}
