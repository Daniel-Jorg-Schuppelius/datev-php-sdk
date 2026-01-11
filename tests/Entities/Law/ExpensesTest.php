<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Expenses\Expenses;
use Datev\Entities\Law\Expenses\Expense;

class ExpensesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "exp-1", "object_type" => "travel", "unit_value" => 250.00],
                ["id" => "exp-2", "object_type" => "hotel", "unit_value" => 150.00]
            ]
        ];
        $collection = new Expenses($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Expense::class, $collection->getValues()[0]);
    }
}
