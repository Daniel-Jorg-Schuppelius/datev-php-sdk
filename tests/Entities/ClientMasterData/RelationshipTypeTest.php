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

use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipType;
use Datev\Entities\ClientMasterData\RelationshipTypes\RelationshipTypes;
use PHPUnit\Framework\TestCase;

class RelationshipTypeTest extends TestCase {
    public function testCreateRelationshipType() {
        $data = [
            "id" => "type-123",
            "abbreviation" => "GF",
            "name" => "Geschäftsführer",
            "standard" => true,
            "type" => 1
        ];

        $relType = new RelationshipType($data);
        $this->assertInstanceOf(RelationshipType::class, new RelationshipType());
        $this->assertInstanceOf(RelationshipType::class, $relType);
        $this->assertNotNull($relType->getID());
        $this->assertEquals("GF", $relType->getAbbreviation());
        $this->assertEquals("Geschäftsführer", $relType->getName());
        $this->assertTrue($relType->isStandard());
        $this->assertEquals(1, $relType->getType());
    }

    public function testCreateRelationshipTypes() {
        $data = [
            "content" => [
                [
                    "id" => "type-001",
                    "abbreviation" => "GF",
                    "name" => "Geschäftsführer"
                ],
                [
                    "id" => "type-002",
                    "abbreviation" => "PM",
                    "name" => "Prokurist"
                ]
            ]
        ];

        $relTypes = new RelationshipTypes($data);
        $this->assertInstanceOf(RelationshipTypes::class, $relTypes);
        $this->assertCount(2, $relTypes->getValues());
    }
}
