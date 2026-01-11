<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Relationships\Relationships;
use Datev\Entities\ClientMasterData\Relationships\Relationship;

class RelationshipsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rel-1", "name" => "Muttergesellschaft", "abbreviation" => "MUT"],
                ["id" => "rel-2", "name" => "Tochtergesellschaft", "abbreviation" => "TOC"]
            ]
        ];
        $collection = new Relationships($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Relationship::class, $collection->getValues()[0]);
    }
}
