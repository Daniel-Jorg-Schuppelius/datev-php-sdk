<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\AccountingAreas\{AccountingArea, AccountingAreas};
use Tests\Contracts\EntityTest;

class AccountingAreasTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "aa-1", "name" => "Area 1", "number" => 1],
                ["id" => "aa-2", "name" => "Area 2", "number" => 2],
            ],
        ];
        $collection = new AccountingAreas($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountingArea::class, $collection->getValues()[0]);
    }
}
