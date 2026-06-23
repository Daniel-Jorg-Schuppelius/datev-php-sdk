<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\{CostCenterPropertyCharacteristic, CostCenterPropertyCharacteristics};
use Tests\Contracts\EntityTest;

class CostCenterPropertyCharacteristicsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "char-1", "description" => "Fertigung"],
                ["id" => "char-2", "description" => "Verwaltung"],
            ],
        ];
        $collection = new CostCenterPropertyCharacteristics($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostCenterPropertyCharacteristic::class, $collection->getValues()[0]);
    }
}
