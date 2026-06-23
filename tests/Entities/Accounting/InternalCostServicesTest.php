<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\InternalCostServices\{InternalCostService, InternalCostServices};
use Tests\Contracts\EntityTest;

class InternalCostServicesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["amount" => 100.00, "cost_center_from" => "KS100", "cost_center_to" => "KS200", "text" => "Interne Leistung IT"],
                ["amount" => 150.00, "cost_center_from" => "KS200", "cost_center_to" => "KS300", "text" => "Interne Leistung HR"],
            ],
        ];
        $collection = new InternalCostServices($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(InternalCostService::class, $collection->getValues()[0]);
    }
}
