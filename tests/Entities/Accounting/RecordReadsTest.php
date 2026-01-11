<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\RecordReads\RecordReads;
use Datev\Entities\Accounting\RecordReads\RecordRead;

class RecordReadsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1001", "account_number" => 1200, "amount" => 500.00, "posting_description" => "Eingangsrechnung 1", "date" => "2024-01-15T00:00:00+01:00", "due_date" => "2024-02-15T00:00:00+01:00", "kost_date" => "2024-01-15T00:00:00+01:00"],
                ["id" => "1002", "account_number" => 1400, "amount" => 750.00, "posting_description" => "Eingangsrechnung 2", "date" => "2024-02-20T00:00:00+01:00", "due_date" => "2024-03-20T00:00:00+01:00", "kost_date" => "2024-02-20T00:00:00+01:00"]
            ]
        ];
        $collection = new RecordReads($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RecordRead::class, $collection->getValues()[0]);
    }
}
