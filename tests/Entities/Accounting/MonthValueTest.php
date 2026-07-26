<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthValueTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AccountingSumsAndBalances\{MonthValue, MonthValues};
use Tests\Contracts\EntityTest;

class MonthValueTest extends EntityTest {
    public function test_create_month_value(): void {
        $data = [
            "monthly_balance" => 1234.56,
            "debit_credit_identifier" => "D",
            "month_debit" => 5000.00,
            "month_credit" => 3765.44,
            "month" => 6,
        ];

        $monthValue = new MonthValue($data);

        $this->assertInstanceOf(MonthValue::class, $monthValue);
        $this->assertSame('1234.56', $monthValue->getMonthlyBalance()?->getAmount());
        $this->assertEquals("D", $monthValue->getDebitCreditIdentifier());
        $this->assertEquals(5000.00, $monthValue->getMonthDebit());
        $this->assertEquals(3765.44, $monthValue->getMonthCredit());
        $this->assertEquals(6, $monthValue->getMonth());
    }

    public function test_create_month_values(): void {
        $data = [
            [
                "monthly_balance" => 1000.00,
                "month" => 1,
            ],
            [
                "monthly_balance" => 2000.00,
                "month" => 2,
            ],
        ];

        $monthValues = new MonthValues($data);

        $this->assertInstanceOf(MonthValues::class, $monthValues);
        $this->assertCount(2, $monthValues);
    }
}
