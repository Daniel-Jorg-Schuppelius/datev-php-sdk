<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostAccountingRecordTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostAccountingRecords\CostAccountingRecord;
use Datev\Entities\Accounting\CostAccountingRecords\CostAccountingRecords;

class CostAccountingRecordTest extends EntityTest {
    public function testCreateCostAccountingRecord() {
        $data = [
            "id" => 1,
            "amount" => 1500.50,
            "cost_center" => "10000",
            "contra_cost_center" => "20000",
            "date" => "2024-01-15T00:00:00.000+00:00",
            "posting_description" => "Kostenumbuchung",
            "record_number" => 1
        ];

        $record = new CostAccountingRecord($data);
        $this->assertInstanceOf(CostAccountingRecord::class, new CostAccountingRecord());
        $this->assertInstanceOf(CostAccountingRecord::class, $record);
        $this->assertEquals(1500.50, $record->getAmount());
        $this->assertEquals("10000", $record->getCostCenter());
        $this->assertEquals("20000", $record->getContraCostCenter());
        $this->assertEquals("Kostenumbuchung", $record->getPostingDescription());
        $this->assertEquals(1, $record->getRecordNumber());
    }

    public function testCreateCostAccountingRecords() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "amount" => 1000.00,
                    "cost_center" => "10000"
                ],
                [
                    "id" => 2,
                    "amount" => 2000.00,
                    "cost_center" => "20000"
                ]
            ]
        ];

        $records = new CostAccountingRecords($data);
        $this->assertInstanceOf(CostAccountingRecords::class, $records);
        $this->assertCount(2, $records->getValues());
    }
}
