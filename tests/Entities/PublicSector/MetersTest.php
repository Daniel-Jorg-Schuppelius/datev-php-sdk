<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Meters\{Meter, Meters};
use Tests\Contracts\EntityTest;

class MetersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "meter-1", "number" => "WZ-001", "meter_number" => "12345678", "usagetype" => "water"],
                ["id" => "meter-2", "number" => "WZ-002", "meter_number" => "87654321", "usagetype" => "electricity"],
            ],
        ];
        $collection = new Meters($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Meter::class, $collection->getValues()[0]);
    }
}
