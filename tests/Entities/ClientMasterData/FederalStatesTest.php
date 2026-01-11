<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\FederalStates\FederalStates;
use Datev\Entities\ClientMasterData\FederalStates\FederalState;

class FederalStatesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "fs-1", "code" => "BY", "name" => "Bayern"],
                ["id" => "fs-2", "code" => "NW", "name" => "Nordrhein-Westfalen"]
            ]
        ];
        $collection = new FederalStates($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FederalState::class, $collection->getValues()[0]);
    }
}
