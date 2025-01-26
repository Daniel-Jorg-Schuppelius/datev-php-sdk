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

use ERRORToolkit\Logger\ConsoleLogger;;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\BankAccounts\BankAccount;
use PHPUnit\Framework\TestCase;

class BankAccountTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

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
        $bankAccount = new BankAccount($data, $this->logger);
        $this->assertInstanceOf(BankAccount::class, new BankAccount());
        $this->assertInstanceOf(BankAccount::class, $bankAccount);
        $this->assertEquals($data, $bankAccount->toArray());
    }
}
