<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AccountingTransactionKeys\AccountingTransactionKeys;
use Datev\Entities\Accounting\AccountingTransactionKeys\AccountingTransactionKey;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AccountingTransactionKeysTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "7", "number" => 7, "tax_rate" => 19.00, "caption" => "Vorsteuer 19%"],
                ["id" => "8", "number" => 8, "tax_rate" => 7.00, "caption" => "Vorsteuer 7%"]
            ]
        ];
        $collection = new AccountingTransactionKeys($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountingTransactionKey::class, $collection->getValues()[0]);
    }
}
