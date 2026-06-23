<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\ExpenseCategories\{ExpenseCategories, ExpenseCategory};
use Tests\Contracts\EntityTest;

class ExpenseCategoriesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["number" => 1, "name" => "Travel"],
                ["number" => 2, "name" => "Office"],
            ],
        ];
        $collection = new ExpenseCategories($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpenseCategory::class, $collection->getValues()[0]);
    }
}
