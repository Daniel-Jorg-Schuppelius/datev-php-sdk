<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorporateStructureTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CorporateStructures\{CorporateStructure, CorporateStructureID, CorporateStructures};
use Tests\Contracts\EntityTest;

class CorporateStructureTest extends EntityTest {
    public function test_create_corporate_structure_id() {
        $id = new CorporateStructureID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(CorporateStructureID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function test_create_corporate_structure() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "name" => "Hauptniederlassung",
            "number" => 1,
            "status" => "active",
        ];

        $structure = new CorporateStructure($data);
        $this->assertInstanceOf(CorporateStructure::class, $structure);
        $this->assertInstanceOf(CorporateStructureID::class, $structure->getID());
        $this->assertEquals("Hauptniederlassung", $structure->getName());
    }

    public function test_create_corporate_structures() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "name" => "Hauptniederlassung",
                "number" => 1,
            ],
        ];

        $structures = new CorporateStructures($data);
        $this->assertInstanceOf(CorporateStructures::class, $structures);
    }
}
