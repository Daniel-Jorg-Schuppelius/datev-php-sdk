<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSumsAndBalanceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\AccountingSumsAndBalances\AccountingSumsAndBalance;
use Datev\Entities\Accounting\AccountingSumsAndBalances\AccountingSumsAndBalances;

class AccountingSumsAndBalanceTest extends EntityTest {
    public function testCreateAccountingSumsAndBalance() {
        $data = [
            "id" => "1200-2024",
            "account_number" => 1200,
            "annual_value_debit" => 15000.00,
            "annual_value_credit" => 12000.00,
            "balance" => 3000.00,
            "balance_debit_credit_identifier" => "D",
            "caption" => "Bank",
            "opening_balance_sheet" => 5000.00,
            "opening_balance_sheet_debit_credit_identifier" => "D"
        ];

        $sumsAndBalance = new AccountingSumsAndBalance($data);
        $this->assertInstanceOf(AccountingSumsAndBalance::class, new AccountingSumsAndBalance());
        $this->assertInstanceOf(AccountingSumsAndBalance::class, $sumsAndBalance);
        $this->assertNotNull($sumsAndBalance->getID());
        $this->assertEquals(1200, $sumsAndBalance->getAccountNumber());
        $this->assertEquals(15000.00, $sumsAndBalance->getAnnualValueDebit());
        $this->assertEquals(12000.00, $sumsAndBalance->getAnnualValueCredit());
        $this->assertEquals(3000.00, $sumsAndBalance->getBalance());
        $this->assertEquals("D", $sumsAndBalance->getBalanceDebitCreditIdentifier());
        $this->assertEquals("Bank", $sumsAndBalance->getCaption());
    }

    public function testCreateAccountingSumsAndBalances() {
        $data = [
            "content" => [
                [
                    "id" => "1200-2024",
                    "account_number" => 1200,
                    "caption" => "Bank"
                ],
                [
                    "id" => "1400-2024",
                    "account_number" => 1400,
                    "caption" => "Forderungen"
                ]
            ]
        ];

        $sumsAndBalances = new AccountingSumsAndBalances($data);
        $this->assertInstanceOf(AccountingSumsAndBalances::class, $sumsAndBalances);
        $this->assertCount(2, $sumsAndBalances->getValues());
    }
}
