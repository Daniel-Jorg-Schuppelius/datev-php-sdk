<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\ContingencyFees\ContingencyFees;
use Datev\Entities\Law\ContingencyFees\ContingencyFee;

class ContingencyFeesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cf-1", "object_type" => "standard", "unit_rate" => 25.0],
                ["id" => "cf-2", "object_type" => "premium", "unit_rate" => 30.0]
            ]
        ];
        $collection = new ContingencyFees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ContingencyFee::class, $collection->getValues()[0]);
    }
}
