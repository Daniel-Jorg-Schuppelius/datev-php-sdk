<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\CostUnits\{CostUnit, CostUnits};
use Tests\Contracts\EntityTest;

class CostUnitsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "1", "name" => "Hauptkostenträger"],
                ["id" => "2", "name" => "Nebenkostenträger"],
            ],
        ];
        $collection = new CostUnits($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostUnit::class, $collection->getValues()[0]);
    }
}
