<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\MonthlyValues\MonthlyValues;
use Datev\Entities\OrderManagement\MonthlyValues\MonthlyValue;

class MonthlyValuesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "mv-1", "order_id" => 1, "year" => 2024, "month" => 1],
                ["id" => "mv-2", "order_id" => 2, "year" => 2024, "month" => 2]
            ]
        ];
        $collection = new MonthlyValues($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MonthlyValue::class, $collection->getValues()[0]);
    }
}
