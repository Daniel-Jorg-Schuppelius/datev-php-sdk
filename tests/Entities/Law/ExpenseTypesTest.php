<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\ExpenseTypes\{ExpenseType, ExpenseTypes};
use Tests\Contracts\EntityTest;

class ExpenseTypesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "et-1", "name" => "Transport", "short_name" => "TRANS"],
                ["id" => "et-2", "name" => "Meals", "short_name" => "MEAL"],
            ],
        ];
        $collection = new ExpenseTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpenseType::class, $collection->getValues()[0]);
    }
}
