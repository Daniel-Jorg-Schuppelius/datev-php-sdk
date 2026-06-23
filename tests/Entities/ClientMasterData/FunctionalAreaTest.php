<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FunctionalAreaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FunctionalAreas\{FunctionalArea, FunctionalAreas};
use Datev\Entities\ClientMasterData\FunctionalAreas\ID\FunctionalAreaID;
use Tests\Contracts\EntityTest;

class FunctionalAreaTest extends EntityTest {
    public function test_create_functional_area_id() {
        $id = new FunctionalAreaID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(FunctionalAreaID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function test_create_functional_area() {
        $data = [
            "id" => "12345678-1234-1234-1234-123456789012",
            "name" => "Buchhaltung",
            "short_name" => "BH",
            "status" => "active",
        ];

        $area = new FunctionalArea($data);
        $this->assertInstanceOf(FunctionalArea::class, $area);
        $this->assertNotNull($area->getID());
        $this->assertEquals("Buchhaltung", $area->getName());
    }

    public function test_create_functional_areas() {
        $data = [
            [
                "id" => "12345678-1234-1234-1234-123456789012",
                "name" => "Buchhaltung",
                "short_name" => "BH",
            ],
            [
                "id" => "12345678-1234-1234-1234-123456789013",
                "name" => "Lohnabrechnung",
                "short_name" => "LA",
            ],
        ];

        $areas = new FunctionalAreas($data);
        $this->assertInstanceOf(FunctionalAreas::class, $areas);
        $this->assertCount(2, $areas);
    }
}
