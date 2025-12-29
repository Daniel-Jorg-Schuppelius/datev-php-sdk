<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RelationshipTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Relationships\Relationship;
use Datev\Entities\ClientMasterData\Relationships\Relationships;
use Datev\Enums\PersonType;
use PHPUnit\Framework\TestCase;

class RelationshipTest extends TestCase {
    public function testCreateRelationship() {
        $data = [
            "id" => "test-relationship-123",
            "abbreviation" => "GF",
            "name" => "Geschäftsführer",
            "standard" => true,
            "type_id" => "type-456",
            "has_addressee_id" => "addr-001",
            "has_addressee_display_name" => "Max Mustermann",
            "has_addressee_type" => "natural_person",
            "is_addressee_id" => "addr-002",
            "is_addressee_display_name" => "Musterfirma GmbH",
            "is_addressee_type" => "legal_person"
        ];

        $relationship = new Relationship($data);
        $this->assertInstanceOf(Relationship::class, new Relationship());
        $this->assertInstanceOf(Relationship::class, $relationship);
        $this->assertNotNull($relationship->getID());
        $this->assertEquals("GF", $relationship->getAbbreviation());
        $this->assertEquals("Geschäftsführer", $relationship->getName());
        $this->assertTrue($relationship->isStandard());
        $this->assertNotNull($relationship->getTypeID());
        $this->assertEquals("Max Mustermann", $relationship->getHasAddresseeDisplayName());
        $this->assertEquals("Musterfirma GmbH", $relationship->getIsAddresseeDisplayName());
    }

    public function testCreateRelationships() {
        $data = [
            "content" => [
                [
                    "id" => "rel-001",
                    "abbreviation" => "GF",
                    "name" => "Geschäftsführer"
                ],
                [
                    "id" => "rel-002",
                    "abbreviation" => "PM",
                    "name" => "Prokurist"
                ]
            ]
        ];

        $relationships = new Relationships($data);
        $this->assertInstanceOf(Relationships::class, $relationships);
        $this->assertCount(2, $relationships->getValues());
    }
}
