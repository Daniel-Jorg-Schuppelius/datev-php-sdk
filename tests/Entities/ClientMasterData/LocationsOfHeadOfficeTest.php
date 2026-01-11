<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LocationsOfHeadOfficeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationsOfHeadOffice;
use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationOfHeadOffice;

class LocationsOfHeadOfficeTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_location_of_head_office" => "München"],
                ["current_location_of_head_office" => "Berlin"]
            ]
        ];

        $locations = new LocationsOfHeadOffice($data);

        $this->assertCount(2, $locations->getValues());
        $this->assertInstanceOf(LocationOfHeadOffice::class, $locations->getValues()[0]);
    }
}
