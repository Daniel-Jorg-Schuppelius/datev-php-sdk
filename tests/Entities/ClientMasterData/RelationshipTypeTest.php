<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RelationshipTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RelationshipTypes\{RelationshipType, RelationshipTypes};
use Tests\Contracts\EntityTest;

class RelationshipTypeTest extends EntityTest {
    public function test_create_relationship_type(): void {
        $data = [
            "id" => "type-123",
            "abbreviation" => "GF",
            "name" => "Geschäftsführer",
            "standard" => true,
            "type" => 1,
        ];

        $relType = new RelationshipType($data);
        $this->assertInstanceOf(RelationshipType::class, new RelationshipType);
        $this->assertInstanceOf(RelationshipType::class, $relType);
        $this->assertEquals("type-123", $relType->getID()->getValue());
        $this->assertEquals("GF", $relType->getAbbreviation());
        $this->assertEquals("Geschäftsführer", $relType->getName());
        $this->assertTrue($relType->isStandard());
        $this->assertEquals(1, $relType->getType());
    }

    public function test_create_relationship_types(): void {
        $data = [
            "content" => [
                [
                    "id" => "type-001",
                    "abbreviation" => "GF",
                    "name" => "Geschäftsführer",
                ],
                [
                    "id" => "type-002",
                    "abbreviation" => "PM",
                    "name" => "Prokurist",
                ],
            ],
        ];

        $relTypes = new RelationshipTypes($data);
        $this->assertInstanceOf(RelationshipTypes::class, $relTypes);
        $this->assertCount(2, $relTypes->getValues());
    }
}
