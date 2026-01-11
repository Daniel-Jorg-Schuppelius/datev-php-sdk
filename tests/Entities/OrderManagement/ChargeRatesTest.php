<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\ChargeRates\ChargeRates;
use Datev\Entities\OrderManagement\ChargeRates\ChargeRate;

class ChargeRatesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cr-1", "employee_id" => "emp-1", "charge_rate_1" => 150.00],
                ["id" => "cr-2", "employee_id" => "emp-2", "charge_rate_1" => 250.00]
            ]
        ];
        $collection = new ChargeRates($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ChargeRate::class, $collection->getValues()[0]);
    }
}
