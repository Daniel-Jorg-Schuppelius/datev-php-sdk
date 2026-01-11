<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\StructureItems\StructureItem;
use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use Datev\Enums\StructureItemType;

class StructureItemTest extends EntityTest {
    public function testCreateStructureItem(): void {
        $data = [
            "name" => "Jahresabschluss_2024.pdf",
            "counter" => 1,
            "size" => 1024000,
            "type" => 1,
            "parent_counter" => 0
        ];

        $structureItem = new StructureItem($data);

        $this->assertInstanceOf(StructureItem::class, $structureItem);
        $this->assertEquals("Jahresabschluss_2024.pdf", $structureItem->getName());
        $this->assertEquals(1, $structureItem->getCounter());
        $this->assertEquals(StructureItemType::File, $structureItem->getType());
        $this->assertEquals(0, $structureItem->getParentCounter());
    }

    public function testCreateStructureItems(): void {
        $data = [
            "content" => [
                [
                    "name" => "Belege",
                    "counter" => 1,
                    "type" => 2,
                    "parent_counter" => 0
                ],
                [
                    "name" => "Rechnung_001.pdf",
                    "counter" => 2,
                    "size" => 512000,
                    "type" => 1,
                    "parent_counter" => 1
                ]
            ]
        ];

        $structureItems = new StructureItems($data);

        $this->assertInstanceOf(StructureItems::class, $structureItems);
        $this->assertCount(2, $structureItems);
        $this->assertInstanceOf(StructureItem::class, $structureItems->getValues()[0]);
    }
}
