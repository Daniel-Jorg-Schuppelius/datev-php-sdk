<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxOfficeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\TaxOffices\TaxOffice;
use Datev\Entities\ClientMasterData\TaxOffices\TaxOffices;
use PHPUnit\Framework\TestCase;

class TaxOfficeTest extends TestCase {
    public function testCreateTaxOffice() {
        $data = [
            "id" => "43b9d6d9-117b-4555-b0b0-3659eb0279d4",
            "tax_office_number" => 9181,
            "tax_office_name" => "Finanzamt München",
            "country_code" => "DE"
        ];

        $office = new TaxOffice($data);
        $this->assertInstanceOf(TaxOffice::class, $office);
        $this->assertNotNull($office->getID());
        $this->assertEquals("Finanzamt München", $office->getTaxOfficeName());
        $this->assertEquals(9181, $office->getTaxOfficeNumber());
    }

    public function testCreateTaxOffices() {
        $data = [
            [
                "id" => "43b9d6d9-117b-4555-b0b0-3659eb0279d4",
                "tax_office_number" => 9181,
                "tax_office_name" => "Finanzamt München"
            ],
            [
                "id" => "43b9d6d9-117b-4555-b0b0-3659eb0279d5",
                "tax_office_number" => 9182,
                "tax_office_name" => "Finanzamt Nürnberg"
            ]
        ];

        $offices = new TaxOffices($data);
        $this->assertInstanceOf(TaxOffices::class, $offices);
        $this->assertCount(2, $offices);
    }
}
