<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CountryCodeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CountryCodes\CountryCode;
use Datev\Entities\ClientMasterData\CountryCodes\CountryCodes;
use PHPUnit\Framework\TestCase;

class CountryCodeTest extends TestCase {
    public function testCreateCountryCode() {
        $data = [
            "id" => "DE",
            "name" => "Germany"
        ];

        $code = new CountryCode($data);
        $this->assertInstanceOf(CountryCode::class, $code);
        $this->assertNotNull($code->getID());
        $this->assertEquals("DE", $code->getID()->toString());
        $this->assertEquals("Germany", $code->getName());
    }

    public function testCreateCountryCodes() {
        $data = [
            [
                "id" => "DE",
                "name" => "Germany"
            ],
            [
                "id" => "AT",
                "name" => "Austria"
            ]
        ];

        $codes = new CountryCodes($data);
        $this->assertInstanceOf(CountryCodes::class, $codes);
        $this->assertCount(2, $codes);
    }
}
