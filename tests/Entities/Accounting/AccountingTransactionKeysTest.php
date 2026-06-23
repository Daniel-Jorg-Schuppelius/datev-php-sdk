<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AccountingTransactionKeys\{AccountingTransactionKey, AccountingTransactionKeys};
use Tests\Contracts\EntityTest;

class AccountingTransactionKeysTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "7", "number" => 7, "tax_rate" => 19.00, "caption" => "Vorsteuer 19%"],
                ["id" => "8", "number" => 8, "tax_rate" => 7.00, "caption" => "Vorsteuer 7%"],
            ],
        ];
        $collection = new AccountingTransactionKeys($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountingTransactionKey::class, $collection->getValues()[0]);
    }
}
