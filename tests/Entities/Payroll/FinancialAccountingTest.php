<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FinancialAccountingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\FinancialAccountings\{FinancialAccounting, FinancialAccountingID, FinancialAccountings};
use Tests\Contracts\EntityTest;

class FinancialAccountingTest extends EntityTest {
    public function test_create_financial_accounting(): void {
        $data = [
            "id" => "fa-001",
            "different_consultant_number" => "54321",
            "different_client_number" => "98765",
        ];

        $financialAccounting = new FinancialAccounting($data);

        $this->assertInstanceOf(FinancialAccounting::class, $financialAccounting);
        $this->assertInstanceOf(FinancialAccountingID::class, $financialAccounting->getID());
        $this->assertEquals("fa-001", $financialAccounting->getID()->getValue());
        $this->assertEquals("54321", $financialAccounting->getDifferentConsultantNumber());
        $this->assertEquals("98765", $financialAccounting->getDifferentClientNumber());
    }

    public function test_create_financial_accountings(): void {
        $data = [
            "content" => [
                [
                    "id" => "fa-001",
                    "different_consultant_number" => "54321",
                ],
                [
                    "id" => "fa-002",
                    "different_consultant_number" => "11111",
                ],
            ],
        ];

        $financialAccountings = new FinancialAccountings($data);

        $this->assertInstanceOf(FinancialAccountings::class, $financialAccountings);
        $this->assertCount(2, $financialAccountings);
        $this->assertInstanceOf(FinancialAccounting::class, $financialAccountings->getValues()[0]);
    }
}
