<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LevelOfJurisdictionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\LevelsOfJurisdiction\{LevelOfJurisdiction, LevelsOfJurisdiction};
use Tests\Contracts\EntityTest;

class LevelOfJurisdictionTest extends EntityTest {
    public function test_create_level_of_jurisdiction(): void {
        $data = [
            "id" => "test-id",
            "name" => "Landgericht",
        ];

        $levelOfJurisdiction = new LevelOfJurisdiction($data);

        $this->assertInstanceOf(LevelOfJurisdiction::class, $levelOfJurisdiction);
        $this->assertEquals("Landgericht", $levelOfJurisdiction->getName());
    }

    public function test_create_levels_of_jurisdiction(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "name" => "Amtsgericht",
                ],
                [
                    "id" => "test-id-2",
                    "name" => "Landgericht",
                ],
            ],
        ];

        $levelsOfJurisdiction = new LevelsOfJurisdiction($data);

        $this->assertInstanceOf(LevelsOfJurisdiction::class, $levelsOfJurisdiction);
        $this->assertCount(2, $levelsOfJurisdiction);
    }
}
