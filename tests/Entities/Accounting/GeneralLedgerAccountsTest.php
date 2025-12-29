<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccountsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccounts;
use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccount;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class GeneralLedgerAccountsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "gla-1",
                    "account_number" => 1200,
                    "caption" => "Bank"
                ],
                [
                    "id" => "gla-2",
                    "account_number" => 1400,
                    "caption" => "Forderungen"
                ]
            ]
        ];

        $accounts = new GeneralLedgerAccounts($data, $this->logger);

        $this->assertCount(2, $accounts->getValues());
        $this->assertInstanceOf(GeneralLedgerAccount::class, $accounts->getValues()[0]);
    }
}
