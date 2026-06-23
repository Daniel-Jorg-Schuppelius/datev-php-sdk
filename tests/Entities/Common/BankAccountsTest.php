<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BankAccountsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\BankAccounts\{BankAccount, BankAccounts};
use Tests\Contracts\EntityTest;

class BankAccountsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "iban" => "DE89370400440532013000",
                    "bic" => "COBADEFFXXX",
                    "bank_name" => "Commerzbank",
                ],
                [
                    "iban" => "DE91100000000123456789",
                    "bic" => "DEUTDEFF",
                    "bank_name" => "Deutsche Bank",
                ],
            ],
        ];

        $bankAccounts = new BankAccounts($data);

        $this->assertCount(2, $bankAccounts->getValues());
        $this->assertInstanceOf(BankAccount::class, $bankAccounts->getValues()[0]);
    }
}
