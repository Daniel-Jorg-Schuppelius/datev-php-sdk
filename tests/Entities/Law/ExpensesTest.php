<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Expenses\{Expense, Expenses};
use Tests\Contracts\EntityTest;

class ExpensesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "exp-1", "object_type" => "travel", "unit_value" => 250.00],
                ["id" => "exp-2", "object_type" => "hotel", "unit_value" => 150.00],
            ],
        ];
        $collection = new Expenses($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Expense::class, $collection->getValues()[0]);
    }
}
