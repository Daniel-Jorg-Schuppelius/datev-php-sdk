<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LevelsOfJurisdictionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\LevelsOfJurisdiction\{LevelOfJurisdiction, LevelsOfJurisdiction};
use Tests\Contracts\EntityTest;

class LevelsOfJurisdictionTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => 1, "name" => "Amtsgericht"],
                ["id" => 2, "name" => "Landgericht"],
            ],
        ];

        $levels = new LevelsOfJurisdiction($data);

        $this->assertCount(2, $levels->getValues());
        $this->assertInstanceOf(LevelOfJurisdiction::class, $levels->getValues()[0]);
    }
}
