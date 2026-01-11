<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingAreaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\AccountingAreas\AccountingArea;
use Datev\Entities\Law\AccountingAreas\AccountingAreas;

class AccountingAreaTest extends EntityTest {
    
    public function testCreateAccountingArea(): void {
        $data = [
            "id" => "test-id",
            "number" => 1,
            "name" => "Finanzbuchhaltung",
            "general_ledger_account_length" => 4,
            "general_ledger_accounts_frame" => 2,
            "taxation_method" => "Sollversteuerung"
        ];

        $accountingArea = new AccountingArea($data);

        $this->assertInstanceOf(AccountingArea::class, $accountingArea);
        $this->assertEquals(1, $accountingArea->getNumber());
        $this->assertEquals("Finanzbuchhaltung", $accountingArea->getName());
        $this->assertEquals(4, $accountingArea->getGeneralLedgerAccountLength());
    }

    public function testCreateAccountingAreas(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "number" => 1,
                    "name" => "Finanzbuchhaltung"
                ],
                [
                    "id" => "test-id-2",
                    "number" => 2,
                    "name" => "Kostenrechnung"
                ]
            ]
        ];

        $accountingAreas = new AccountingAreas($data);

        $this->assertInstanceOf(AccountingAreas::class, $accountingAreas);
        $this->assertCount(2, $accountingAreas);
    }
}
