<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWorks;
use Datev\Entities\OrderManagement\OrderStateWork\OrderStateWork;

class OrderStateWorksTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "osw-1", "order_id" => 1, "order_number" => 1001],
                ["id" => "osw-2", "order_id" => 2, "order_number" => 1002]
            ]
        ];
        $collection = new OrderStateWorks($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(OrderStateWork::class, $collection->getValues()[0]);
    }
}
