<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CorporateStructures\{CorporateStructure, CorporateStructures};
use Tests\Contracts\EntityTest;

class CorporateStructuresTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cs-1", "name" => "Hauptsitz", "number" => 1],
                ["id" => "cs-2", "name" => "Niederlassung", "number" => 2],
            ],
        ];
        $collection = new CorporateStructures($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CorporateStructure::class, $collection->getValues()[0]);
    }
}
