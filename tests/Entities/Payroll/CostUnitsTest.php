<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\CostUnits\CostUnits;
use Datev\Entities\Payroll\CostUnits\CostUnit;

class CostUnitsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "name" => "Hauptkostenträger"],
                ["id" => "2", "name" => "Nebenkostenträger"]
            ]
        ];
        $collection = new CostUnits($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostUnit::class, $collection->getValues()[0]);
    }
}
