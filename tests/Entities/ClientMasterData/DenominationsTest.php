<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Denominations\{Denomination, Denominations};
use Tests\Contracts\EntityTest;

class DenominationsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "den-1", "name" => "Denomination 1"],
                ["id" => "den-2", "name" => "Denomination 2"],
            ],
        ];
        $collection = new Denominations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Denomination::class, $collection->getValues()[0]);
    }
}
