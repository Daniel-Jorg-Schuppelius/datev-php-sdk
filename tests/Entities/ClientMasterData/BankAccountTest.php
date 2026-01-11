<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankAccountTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\BankAccounts\BankAccount;

class BankAccountTest extends EntityTest {
    public function testCreateBankAccount() {
        $data = [
            "id" => "31b9d6d9-117b-4555-b0b0-3659eb0279d0",
            "bank_account_number" => "3225553",
            "bank_code" => "76050101",
            "bank_name" => "Sparkasse Nürnberg",
            "bic" => "SSKNDE77XXX",
            "country_code" => "DE",
            "differing_account_holder" => "Max Mustermann",
            "iban" => "DE12760501010003225553",
            "note" => "Das ist eine Notiz zur Bankverbindung.",
            "valid_from" => "2015-03-31T00:00:00.000+00:00",
            "valid_to" => "2018-04-30T00:00:00.000+00:00",
            "currently_valid" => true,
            "is_main_bank_account" => true
        ];

        $bankAccount = new BankAccount($data);
        $this->assertTrue($bankAccount->isValid());
        $bankAccount = new BankAccount($data);
        $this->assertInstanceOf(BankAccount::class, new BankAccount());
        $this->assertInstanceOf(BankAccount::class, $bankAccount);
        $this->assertEquals($data, $bankAccount->toArray());
    }
}
