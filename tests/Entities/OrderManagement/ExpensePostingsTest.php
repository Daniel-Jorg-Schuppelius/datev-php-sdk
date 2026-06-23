<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\ExpensePostings\{ExpensePosting, ExpensePostings};
use Tests\Contracts\EntityTest;

class ExpensePostingsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ep-1", "order_id" => 1, "cost_amount" => 500.00],
                ["id" => "ep-2", "order_id" => 2, "cost_amount" => 750.00],
            ],
        ];
        $collection = new ExpensePostings($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpensePosting::class, $collection->getValues()[0]);
    }
}
