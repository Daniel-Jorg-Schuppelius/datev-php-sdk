<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Accounts\Account;
use Datev\Entities\Payroll\Accounts\Accounts;
use Datev\Entities\Payroll\Accounts\AccountID;

class AccountTest extends EntityTest {
    public function testCreateAccount(): void {
        $data = [
            "id" => "acc-001",
            "iban" => "DE89370400440532013000",
            "bic" => "DEUTDEDB",
            "differing_account_holder" => "Max Mustermann"
        ];

        $account = new Account($data);

        $this->assertInstanceOf(Account::class, $account);
        $this->assertInstanceOf(AccountID::class, $account->getID());
        $this->assertEquals("acc-001", $account->getID()->getValue());
        $this->assertEquals("Max Mustermann", $account->getDifferingAccountHolder());
    }

    public function testCreateAccounts(): void {
        $data = [
            "content" => [
                [
                    "id" => "acc-001",
                    "iban" => "DE89370400440532013000"
                ],
                [
                    "id" => "acc-002",
                    "iban" => "DE91100000000123456789"
                ]
            ]
        ];

        $accounts = new Accounts($data);

        $this->assertInstanceOf(Accounts::class, $accounts);
        $this->assertCount(2, $accounts);
        $this->assertInstanceOf(Account::class, $accounts->getValues()[0]);
    }
}
