<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\ExpenseCategories\ExpenseCategories;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategory;

class ExpenseCategoriesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["number" => 1, "name" => "Travel"],
                ["number" => 2, "name" => "Office"]
            ]
        ];
        $collection = new ExpenseCategories($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpenseCategory::class, $collection->getValues()[0]);
    }
}
