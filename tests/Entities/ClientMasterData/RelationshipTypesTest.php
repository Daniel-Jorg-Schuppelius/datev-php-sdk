<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RelationshipTypes\{RelationshipType, RelationshipTypes};
use Tests\Contracts\EntityTest;

class RelationshipTypesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "rt-1", "type" => 1, "name" => "Parent"],
                ["id" => "rt-2", "type" => 2, "name" => "Subsidiary"],
            ],
        ];
        $collection = new RelationshipTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RelationshipType::class, $collection->getValues()[0]);
    }
}
