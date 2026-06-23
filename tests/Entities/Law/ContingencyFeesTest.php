<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\ContingencyFees\{ContingencyFee, ContingencyFees};
use Tests\Contracts\EntityTest;

class ContingencyFeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cf-1", "object_type" => "standard", "unit_rate" => 25.0],
                ["id" => "cf-2", "object_type" => "premium", "unit_rate" => 30.0],
            ],
        ];
        $collection = new ContingencyFees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ContingencyFee::class, $collection->getValues()[0]);
    }
}
