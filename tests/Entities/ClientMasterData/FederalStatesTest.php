<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FederalStates\{FederalState, FederalStates};
use Tests\Contracts\EntityTest;

class FederalStatesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "fs-1", "code" => "BY", "name" => "Bayern"],
                ["id" => "fs-2", "code" => "NW", "name" => "Nordrhein-Westfalen"],
            ],
        ];
        $collection = new FederalStates($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FederalState::class, $collection->getValues()[0]);
    }
}
