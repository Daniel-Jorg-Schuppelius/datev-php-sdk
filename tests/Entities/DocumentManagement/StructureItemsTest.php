<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use Datev\Entities\DocumentManagement\StructureItems\StructureItem;

class StructureItemsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "si-1", "name" => "Root", "type" => 2],
                ["id" => "si-2", "name" => "Document.pdf", "type" => 1]
            ]
        ];
        $collection = new StructureItems($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(StructureItem::class, $collection->getValues()[0]);
    }
}
