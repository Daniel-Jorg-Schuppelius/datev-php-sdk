<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostCenterProperties\{CostCenterProperties, CostCenterProperty};
use Tests\Contracts\EntityTest;

class CostCenterPropertiesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "prop-1", "description" => "Abteilung"],
                ["id" => "prop-2", "description" => "Standort"],
            ],
        ];
        $collection = new CostCenterProperties($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostCenterProperty::class, $collection->getValues()[0]);
    }
}
