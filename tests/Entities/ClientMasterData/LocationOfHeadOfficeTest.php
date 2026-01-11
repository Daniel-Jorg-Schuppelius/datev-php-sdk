<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LocationOfHeadOfficeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationOfHeadOffice;
use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\LocationsOfHeadOffice;

class LocationOfHeadOfficeTest extends EntityTest {
    public function testCreateLocationOfHeadOffice() {
        $data = [
            "value" => "München",
            "valid_from" => "2024-01-01"
        ];

        $location = new LocationOfHeadOffice($data);
        $this->assertInstanceOf(LocationOfHeadOffice::class, $location);
    }

    public function testCreateLocationsOfHeadOffice() {
        $data = [
            [
                "value" => "München",
                "valid_from" => "2024-01-01"
            ]
        ];

        $locations = new LocationsOfHeadOffice($data);
        $this->assertInstanceOf(LocationsOfHeadOffice::class, $locations);
    }
}
