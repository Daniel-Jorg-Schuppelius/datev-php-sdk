<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\InternalCostServices\InternalCostServices;
use Datev\Entities\Accounting\InternalCostServices\InternalCostService;

class InternalCostServicesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["amount" => 100.00, "cost_center_from" => "KS100", "cost_center_to" => "KS200", "text" => "Interne Leistung IT"],
                ["amount" => 150.00, "cost_center_from" => "KS200", "cost_center_to" => "KS300", "text" => "Interne Leistung HR"]
            ]
        ];
        $collection = new InternalCostServices($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(InternalCostService::class, $collection->getValues()[0]);
    }
}
