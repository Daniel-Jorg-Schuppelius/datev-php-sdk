<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostAccountingRecords\CostAccountingRecords;
use Datev\Entities\Accounting\CostAccountingRecords\CostAccountingRecord;

class CostAccountingRecordsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1001", "amount" => 1000.00, "cost_center" => "KS100", "posting_description" => "Kostenart Büromaterial"],
                ["id" => "1002", "amount" => 2000.00, "cost_center" => "KS200", "posting_description" => "Kostenart Reisekosten"]
            ]
        ];
        $collection = new CostAccountingRecords($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostAccountingRecord::class, $collection->getValues()[0]);
    }
}
