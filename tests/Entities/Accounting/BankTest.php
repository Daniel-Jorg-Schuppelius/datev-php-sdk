<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Banks\Bank;
use Datev\Entities\Accounting\Banks\Banks;

class BankTest extends EntityTest {
    public function testCreateBank() {
        $data = [
            "bank_name" => "Deutsche Bank",
            "bic" => "DEUTDEDB",
            "iban" => "DE89370400440532013000",
            "business_partner_bank_position" => 1,
            "is_business_partner_bank" => true
        ];

        $bank = new Bank($data);
        $this->assertInstanceOf(Bank::class, new Bank());
        $this->assertInstanceOf(Bank::class, $bank);
    }

    public function testCreateBanks() {
        $data = [
            "content" => [
                [
                    "bank_name" => "Bank 1",
                    "iban" => "DE89370400440532013001"
                ],
                [
                    "bank_name" => "Bank 2",
                    "iban" => "DE89370400440532013002"
                ]
            ]
        ];

        $banks = new Banks($data);
        $this->assertInstanceOf(Banks::class, $banks);
        $this->assertCount(2, $banks->getValues());
    }
}
