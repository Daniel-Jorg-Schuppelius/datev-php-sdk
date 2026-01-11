<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Denominations\Denominations;
use Datev\Entities\ClientMasterData\Denominations\Denomination;

class DenominationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "den-1", "name" => "Denomination 1"],
                ["id" => "den-2", "name" => "Denomination 2"]
            ]
        ];
        $collection = new Denominations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Denomination::class, $collection->getValues()[0]);
    }
}
