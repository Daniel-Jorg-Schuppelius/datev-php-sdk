<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitorTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Debitors\Debitor;
use Datev\Entities\Accounting\Debitors\Debitors;

class DebitorTest extends EntityTest {
    public function testCreateDebitor() {
        $data = [
            "id" => 10001,
            "account_number" => 10001,
            "addressee_id" => "d13f9c3c-380c-494e-97c8-d12fff738189",
            "caption" => "Muster GmbH",
            "short_name" => "MUSTER",
            "business_partner_number" => "BP-001",
            "eu_vat_id_country_code" => "DE",
            "eu_vat_id_number" => "123456789",
            "is_business_partner_active" => true,
            "date_last_modification" => "2024-12-28T10:30:00.000+00:00"
        ];

        $debitor = new Debitor($data);
        $this->assertInstanceOf(Debitor::class, new Debitor());
        $this->assertInstanceOf(Debitor::class, $debitor);
        $this->assertEquals(10001, $debitor->getAccountNumber());
        $this->assertEquals("Muster GmbH", $debitor->getCaption());
        $this->assertEquals("MUSTER", $debitor->getShortName());
        $this->assertTrue($debitor->isBusinessPartnerActive());
    }

    public function testCreateDebitors() {
        $data = [
            "content" => [
                [
                    "id" => 10001,
                    "account_number" => 10001,
                    "caption" => "Debitor 1"
                ],
                [
                    "id" => 10002,
                    "account_number" => 10002,
                    "caption" => "Debitor 2"
                ]
            ]
        ];

        $debitors = new Debitors($data);
        $this->assertInstanceOf(Debitors::class, $debitors);
        $this->assertCount(2, $debitors->getValues());
    }
}
