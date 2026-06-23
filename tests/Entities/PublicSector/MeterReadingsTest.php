<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\MeterReadings\{MeterReading, MeterReadings};
use Tests\Contracts\EntityTest;

class MeterReadingsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "mr-1", "date" => "2024-01-15", "value" => 12345.6, "reading_reason" => "regular"],
                ["id" => "mr-2", "date" => "2024-01-15", "value" => 67890.1, "reading_reason" => "estimated"],
            ],
        ];
        $collection = new MeterReadings($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MeterReading::class, $collection->getValues()[0]);
    }
}
