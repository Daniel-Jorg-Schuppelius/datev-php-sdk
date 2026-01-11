<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperties;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperty;

class CostCenterPropertiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "prop-1", "description" => "Abteilung"],
                ["id" => "prop-2", "description" => "Standort"]
            ]
        ];
        $collection = new CostCenterProperties($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostCenterProperty::class, $collection->getValues()[0]);
    }
}
