<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccountTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccount;
use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccounts;

class GeneralLedgerAccountTest extends EntityTest {
    public function testCreateGeneralLedgerAccount() {
        $data = [
            "id" => 1800,
            "account_number" => 1800,
            "caption" => "Bank",
            "accounting_transaction_key" => 0,
            "account_function" => "bank",
            "is_locked" => false,
            "date_last_modification" => "2024-12-28T10:30:00.000+00:00"
        ];

        $account = new GeneralLedgerAccount($data);
        $this->assertInstanceOf(GeneralLedgerAccount::class, new GeneralLedgerAccount());
        $this->assertInstanceOf(GeneralLedgerAccount::class, $account);
        $this->assertEquals(1800, $account->getAccountNumber());
        $this->assertEquals("Bank", $account->getCaption());
        $this->assertEquals("bank", $account->getAccountFunction());
        $this->assertFalse($account->isLocked());
    }

    public function testCreateGeneralLedgerAccounts() {
        $data = [
            "content" => [
                [
                    "id" => 1800,
                    "account_number" => 1800,
                    "caption" => "Bank"
                ],
                [
                    "id" => 4400,
                    "account_number" => 4400,
                    "caption" => "Umsatzerlöse"
                ]
            ]
        ];

        $accounts = new GeneralLedgerAccounts($data);
        $this->assertInstanceOf(GeneralLedgerAccounts::class, $accounts);
        $this->assertCount(2, $accounts->getValues());
    }
}
