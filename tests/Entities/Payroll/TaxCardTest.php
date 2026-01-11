<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxCardTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Taxations\TaxCards\TaxCard;
use Datev\Entities\Payroll\Taxations\TaxCards\TaxCards;

class TaxCardTest extends EntityTest {
    public function testCreateTaxCard(): void {
        $data = [
            "id" => "tc-001",
            "tax_class" => 1,
            "factor" => 1.0,
            "denomination" => "Hauptlohnsteuerkarte"
        ];

        $taxCard = new TaxCard($data);

        $this->assertInstanceOf(TaxCard::class, $taxCard);
    }

    public function testCreateTaxCards(): void {
        $data = [
            "content" => [
                [
                    "id" => "tc-001",
                    "tax_class" => 1
                ],
                [
                    "id" => "tc-002",
                    "tax_class" => 3
                ]
            ]
        ];

        $taxCards = new TaxCards($data);

        $this->assertInstanceOf(TaxCards::class, $taxCards);
        $this->assertCount(2, $taxCards);
    }
}
