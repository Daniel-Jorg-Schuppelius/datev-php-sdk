<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\MonthlyValues\{MonthlyValue, MonthlyValues};
use Tests\Contracts\EntityTest;

class MonthlyValuesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "mv-1", "order_id" => 1, "year" => 2024, "month" => 1],
                ["id" => "mv-2", "order_id" => 2, "year" => 2024, "month" => 2],
            ],
        ];
        $collection = new MonthlyValues($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MonthlyValue::class, $collection->getValues()[0]);
    }
}
