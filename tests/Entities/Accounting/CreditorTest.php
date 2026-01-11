<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Creditors\Creditor;
use Datev\Entities\Accounting\Creditors\Creditors;

class CreditorTest extends EntityTest {
    public function testCreateCreditor() {
        $data = [
            "id" => 70001,
            "account_number" => 70001,
            "addressee_id" => "a23f9c3c-380c-494e-97c8-d12fff738189",
            "caption" => "Lieferant GmbH",
            "short_name" => "LIEFERANT",
            "business_partner_number" => "LF-001",
            "eu_vat_id_country_code" => "DE",
            "eu_vat_id_number" => "987654321",
            "is_business_partner_active" => true,
            "date_last_modification" => "2024-12-28T10:30:00.000+00:00"
        ];

        $creditor = new Creditor($data);
        $this->assertInstanceOf(Creditor::class, new Creditor());
        $this->assertInstanceOf(Creditor::class, $creditor);
        $this->assertEquals(70001, $creditor->getAccountNumber());
        $this->assertEquals("Lieferant GmbH", $creditor->getCaption());
        $this->assertEquals("LIEFERANT", $creditor->getShortName());
        $this->assertTrue($creditor->isBusinessPartnerActive());
    }

    public function testCreateCreditors() {
        $data = [
            "content" => [
                [
                    "id" => 70001,
                    "account_number" => 70001,
                    "caption" => "Kreditor 1"
                ],
                [
                    "id" => 70002,
                    "account_number" => 70002,
                    "caption" => "Kreditor 2"
                ]
            ]
        ];

        $creditors = new Creditors($data);
        $this->assertInstanceOf(Creditors::class, $creditors);
        $this->assertCount(2, $creditors->getValues());
    }
}
