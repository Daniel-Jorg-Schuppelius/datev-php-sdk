<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CompanyDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CompanyData;
use Tests\Contracts\EntityTest;

class CompanyDataTest extends EntityTest {
    public function test_create_company_data(): void {
        $data = "DE98ZZZ09999999999";
        $companyData = new CompanyData($data);
        $this->assertInstanceOf(CompanyData::class, $companyData);
        $this->assertEquals("DE98ZZZ09999999999", $companyData->getValue());
    }

    public function test_company_data_to_array(): void {
        $data = "DE98ZZZ09999999999";
        $companyData = new CompanyData($data);
        $array = $companyData->toArray();
        $this->assertEquals(["creditor_identifier" => "DE98ZZZ09999999999"], $array);
    }

    public function test_company_data_null_value(): void {
        $companyData = new CompanyData(null);
        $this->assertInstanceOf(CompanyData::class, $companyData);
        $this->assertEquals([], $companyData->toArray());
    }
}
