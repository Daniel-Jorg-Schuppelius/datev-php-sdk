<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\BankAccounts\{BankAccount, BankAccounts};
use Tests\Contracts\EntityTest;

class BankAccountsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ba-1", "iban" => "DE89370400440532013000", "bic" => "COBADEFFXXX"],
                ["id" => "ba-2", "iban" => "DE89370400440532013001", "bic" => "DEUTDEFF"],
            ],
        ];
        $collection = new BankAccounts($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(BankAccount::class, $collection->getValues()[0]);
    }
}
