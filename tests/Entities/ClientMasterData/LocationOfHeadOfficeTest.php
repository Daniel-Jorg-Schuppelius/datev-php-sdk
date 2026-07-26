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

use Datev\Entities\ClientMasterData\LocationsOfHeadOffice\{LocationOfHeadOffice, LocationsOfHeadOffice};
use Tests\Contracts\EntityTest;

class LocationOfHeadOfficeTest extends EntityTest {
    public function test_create_location_of_head_office(): void {
        $data = [
            "value" => "München",
            "valid_from" => "2024-01-01",
        ];

        $location = new LocationOfHeadOffice($data);
        $this->assertInstanceOf(LocationOfHeadOffice::class, $location);
    }

    public function test_create_locations_of_head_office(): void {
        $data = [
            [
                "value" => "München",
                "valid_from" => "2024-01-01",
            ],
        ];

        $locations = new LocationsOfHeadOffice($data);
        $this->assertInstanceOf(LocationsOfHeadOffice::class, $locations);
    }
}
