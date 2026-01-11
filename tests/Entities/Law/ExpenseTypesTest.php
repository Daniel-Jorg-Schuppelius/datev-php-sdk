<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\ExpenseTypes\ExpenseTypes;
use Datev\Entities\Law\ExpenseTypes\ExpenseType;

class ExpenseTypesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "et-1", "name" => "Transport", "short_name" => "TRANS"],
                ["id" => "et-2", "name" => "Meals", "short_name" => "MEAL"]
            ]
        ];
        $collection = new ExpenseTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ExpenseType::class, $collection->getValues()[0]);
    }
}
