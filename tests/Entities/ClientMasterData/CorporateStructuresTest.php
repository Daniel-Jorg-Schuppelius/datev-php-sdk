<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\CorporateStructures\CorporateStructures;
use Datev\Entities\ClientMasterData\CorporateStructures\CorporateStructure;

class CorporateStructuresTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cs-1", "name" => "Hauptsitz", "number" => 1],
                ["id" => "cs-2", "name" => "Niederlassung", "number" => 2]
            ]
        ];
        $collection = new CorporateStructures($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CorporateStructure::class, $collection->getValues()[0]);
    }
}
