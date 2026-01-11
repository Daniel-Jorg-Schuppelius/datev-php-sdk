<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalAreas;
use Datev\Entities\ClientMasterData\FunctionalAreas\FunctionalArea;

class FunctionalAreasTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "fa-1", "name" => "Sales"],
                ["id" => "fa-2", "name" => "Marketing"]
            ]
        ];
        $collection = new FunctionalAreas($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FunctionalArea::class, $collection->getValues()[0]);
    }
}
