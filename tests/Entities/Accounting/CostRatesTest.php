<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostRates\CostRates;
use Datev\Entities\Accounting\CostRates\CostRate;

class CostRatesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["valid_from" => 202401, "valid_to" => 202412, "rate" => 75.00],
                ["valid_from" => 202501, "valid_to" => 202512, "rate" => 80.00]
            ]
        ];
        $collection = new CostRates($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostRate::class, $collection->getValues()[0]);
    }
}
