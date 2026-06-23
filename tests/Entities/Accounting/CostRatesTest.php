<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostRates\{CostRate, CostRates};
use Tests\Contracts\EntityTest;

class CostRatesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["valid_from" => 202401, "valid_to" => 202412, "rate" => 75.00],
                ["valid_from" => 202501, "valid_to" => 202512, "rate" => 80.00],
            ],
        ];
        $collection = new CostRates($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostRate::class, $collection->getValues()[0]);
    }
}
