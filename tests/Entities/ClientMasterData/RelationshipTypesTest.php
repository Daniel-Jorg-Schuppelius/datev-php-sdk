<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipTypes;
use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipType;

class RelationshipTypesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rt-1", "type" => 1, "name" => "Parent"],
                ["id" => "rt-2", "type" => 2, "name" => "Subsidiary"]
            ]
        ];
        $collection = new RelationshipTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RelationshipType::class, $collection->getValues()[0]);
    }
}
