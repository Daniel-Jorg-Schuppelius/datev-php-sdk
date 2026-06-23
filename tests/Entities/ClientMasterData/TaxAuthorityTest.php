<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxAuthorityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\TaxAuthorities\{TaxAuthorities, TaxAuthority, TaxAuthorityID};
use Tests\Contracts\EntityTest;

class TaxAuthorityTest extends EntityTest {
    public function test_create_tax_authority_id() {
        $id = new TaxAuthorityID("12345678-1234-1234-1234-123456789012");
        $this->assertInstanceOf(TaxAuthorityID::class, $id);
        $this->assertEquals("12345678-1234-1234-1234-123456789012", $id->toString());
    }

    public function test_create_tax_authority() {
        $data = [
            "id" => "000645",
            "name" => "Finanzamt München",
            "city" => "München",
            "number" => 9181,
            "country_code" => "DE",
        ];

        $authority = new TaxAuthority($data);
        $this->assertInstanceOf(TaxAuthority::class, $authority);
        $this->assertNotNull($authority->getID());
        $this->assertEquals("Finanzamt München", $authority->getName());
        $this->assertEquals(9181, $authority->getNumber());
    }

    public function test_create_tax_authorities() {
        $data = [
            [
                "id" => "000645",
                "name" => "Finanzamt München",
                "city" => "München",
            ],
            [
                "id" => "000646",
                "name" => "Finanzamt Nürnberg",
                "city" => "Nürnberg",
            ],
        ];

        $authorities = new TaxAuthorities($data);
        $this->assertInstanceOf(TaxAuthorities::class, $authorities);
        $this->assertCount(2, $authorities);
    }
}
