<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\AccountingAreas\AccountingAreas;
use Datev\Entities\Law\AccountingAreas\AccountingArea;

class AccountingAreasTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "aa-1", "name" => "Area 1", "number" => 1],
                ["id" => "aa-2", "name" => "Area 2", "number" => 2]
            ]
        ];
        $collection = new AccountingAreas($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountingArea::class, $collection->getValues()[0]);
    }
}
