<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\BankAccounts\BankAccounts;
use Datev\Entities\ClientMasterData\BankAccounts\BankAccount;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BankAccountsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ba-1", "iban" => "DE89370400440532013000", "bic" => "COBADEFFXXX"],
                ["id" => "ba-2", "iban" => "DE89370400440532013001", "bic" => "DEUTDEFF"]
            ]
        ];
        $collection = new BankAccounts($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(BankAccount::class, $collection->getValues()[0]);
    }
}
