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

namespace Tests\Entities\Common;

use Datev\Entities\Common\BankAccounts\BankAccount;
use Datev\Entities\Common\BankAccounts\BankAccounts;
use Datev\Entities\Common\BankAccounts\BankAccountID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class BankAccountTest extends TestCase {
    public function testCreateBankAccount(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "bank-001",
            "bank_account_number" => "1234567890",
            "bank_code" => "70070024",
            "bank_name" => "Deutsche Bank",
            "iban" => "DE89370400440532013000",
            "bic" => "DEUTDEDB"
        ];

        $bankAccount = new BankAccount($data, $logger);

        $this->assertInstanceOf(BankAccount::class, $bankAccount);
        $this->assertInstanceOf(BankAccountID::class, $bankAccount->getID());
        $this->assertEquals("bank-001", $bankAccount->getID()->getValue());
        $this->assertEquals("1234567890", $bankAccount->getBankAccountNumber());
        $this->assertEquals("70070024", $bankAccount->getBankCode());
        $this->assertEquals("Deutsche Bank", $bankAccount->getBankName());
    }

    public function testCreateBankAccounts(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "bank-001",
                    "bank_name" => "Deutsche Bank",
                    "iban" => "DE89370400440532013000"
                ],
                [
                    "id" => "bank-002",
                    "bank_name" => "Commerzbank",
                    "iban" => "DE91100000000123456789"
                ]
            ]
        ];

        $bankAccounts = new BankAccounts($data, $logger);

        $this->assertInstanceOf(BankAccounts::class, $bankAccounts);
        $this->assertCount(2, $bankAccounts);
        $this->assertInstanceOf(BankAccount::class, $bankAccounts->getValues()[0]);
    }
}
