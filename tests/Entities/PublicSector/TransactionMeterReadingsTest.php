<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionMeterReadings\{TransactionMeterReading, TransactionMeterReadings};
use Tests\Contracts\EntityTest;

class TransactionMeterReadingsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "type" => "regular"],
                ["id" => 2, "status" => "pending", "type" => "estimated"],
            ],
        ];
        $collection = new TransactionMeterReadings($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionMeterReading::class, $collection->getValues()[0]);
    }
}
