<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FunctionalAreas\{FunctionalArea, FunctionalAreas};
use Tests\Contracts\EntityTest;

class FunctionalAreasTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "fa-1", "name" => "Sales"],
                ["id" => "fa-2", "name" => "Marketing"],
            ],
        ];
        $collection = new FunctionalAreas($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FunctionalArea::class, $collection->getValues()[0]);
    }
}
