<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CountryOfHeadOfficeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CountriesOfHeadOffice\{CountriesOfHeadOffice, CountryOfHeadOffice};
use Tests\Contracts\EntityTest;

class CountryOfHeadOfficeTest extends EntityTest {
    public function test_create_country_of_head_office(): void {
        $data = [
            "value" => "DE",
            "valid_from" => "2024-01-01",
        ];

        $country = new CountryOfHeadOffice($data);
        $this->assertInstanceOf(CountryOfHeadOffice::class, $country);
    }

    public function test_create_countries_of_head_office(): void {
        $data = [
            [
                "value" => "DE",
                "valid_from" => "2024-01-01",
            ],
        ];

        $countries = new CountriesOfHeadOffice($data);
        $this->assertInstanceOf(CountriesOfHeadOffice::class, $countries);
    }
}
