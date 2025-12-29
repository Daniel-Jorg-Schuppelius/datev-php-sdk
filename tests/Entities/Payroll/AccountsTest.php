<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Accounts\Accounts;
use Datev\Entities\Payroll\Accounts\Account;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AccountsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "00001",
                    "iban" => "DE89370400440532013000",
                    "bic" => "COBADEFFXXX",
                    "differing_account_holder" => "Max Mustermann"
                ],
                [
                    "id" => "00002",
                    "iban" => "DE12500105170648489890",
                    "bic" => "INGDDEFFXXX",
                    "differing_account_holder" => "Erika Musterfrau"
                ]
            ]
        ];

        $accounts = new Accounts($data, $this->logger);

        $this->assertCount(2, $accounts->getValues());
        $this->assertInstanceOf(Account::class, $accounts->getValues()[0]);
    }
}
