<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingTransactionKeyTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\AccountingTransactionKeys\AccountingTransactionKey;
use Datev\Entities\Accounting\AccountingTransactionKeys\AccountingTransactionKeys;

class AccountingTransactionKeyTest extends EntityTest {
    public function testCreateAccountingTransactionKey() {
        $data = [
            "id" => "BU-1",
            "number" => 1,
            "caption" => "Nicht steuerbar (USt)",
            "additional_function" => "None",
            "tax_rate" => 0.00,
            "is_tax_rate_selectable" => false,
            "date_from" => "2020-01-01",
            "date_to" => "2099-12-31",
            "group" => "Standard"
        ];

        $transactionKey = new AccountingTransactionKey($data);
        $this->assertInstanceOf(AccountingTransactionKey::class, new AccountingTransactionKey());
        $this->assertInstanceOf(AccountingTransactionKey::class, $transactionKey);
        $this->assertNotNull($transactionKey->getID());
        $this->assertEquals(1, $transactionKey->getNumber());
        $this->assertEquals("Nicht steuerbar (USt)", $transactionKey->getCaption());
        $this->assertEquals(0.00, $transactionKey->getTaxRate());
        $this->assertFalse($transactionKey->isTaxRateSelectable());
    }

    public function testCreateAccountingTransactionKeys() {
        $data = [
            "content" => [
                [
                    "id" => "BU-1",
                    "number" => 1,
                    "caption" => "Nicht steuerbar (USt)"
                ],
                [
                    "id" => "BU-2",
                    "number" => 2,
                    "caption" => "Umsatzsteuerfrei"
                ]
            ]
        ];

        $transactionKeys = new AccountingTransactionKeys($data);
        $this->assertInstanceOf(AccountingTransactionKeys::class, $transactionKeys);
        $this->assertCount(2, $transactionKeys->getValues());
    }
}
