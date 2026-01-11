<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReadings;
use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReading;

class TransactionMeterReadingsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "status" => "active", "type" => "regular"],
                ["id" => 2, "status" => "pending", "type" => "estimated"]
            ]
        ];
        $collection = new TransactionMeterReadings($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TransactionMeterReading::class, $collection->getValues()[0]);
    }
}
