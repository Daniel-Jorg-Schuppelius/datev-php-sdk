<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BanksTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Banks\Banks;
use Datev\Entities\Accounting\Banks\Bank;

class BanksTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "iban" => "DE89370400440532013000",
                    "bic" => "COBADEFFXXX",
                    "bank_name" => "Commerzbank",
                    "business_partner_bank_position" => 1,
                    "is_business_partner_bank" => true
                ],
                [
                    "iban" => "DE91100000000123456789",
                    "bic" => "DEUTDEFF",
                    "bank_name" => "Deutsche Bank",
                    "business_partner_bank_position" => 2,
                    "is_business_partner_bank" => false
                ]
            ]
        ];

        $banks = new Banks($data);

        $this->assertCount(2, $banks->getValues());
        $this->assertInstanceOf(Bank::class, $banks->getValues()[0]);
    }
}
