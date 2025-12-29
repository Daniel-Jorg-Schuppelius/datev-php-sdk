<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AccountingSumsAndBalances\AccountingSumsAndBalances;
use Datev\Entities\Accounting\AccountingSumsAndBalances\AccountingSumsAndBalance;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AccountingSumsAndBalancesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1200", "account_number" => 1200, "balance" => 500.00, "caption" => "Bank", "annual_value_debit" => 1000.00, "annual_value_credit" => 500.00],
                ["id" => "1400", "account_number" => 1400, "balance" => 1500.00, "caption" => "Forderungen", "annual_value_debit" => 2000.00, "annual_value_credit" => 500.00]
            ]
        ];
        $collection = new AccountingSumsAndBalances($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountingSumsAndBalance::class, $collection->getValues()[0]);
    }
}
