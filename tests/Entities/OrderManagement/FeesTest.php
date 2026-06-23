<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Fees\{Fee, Fees};
use Tests\Contracts\EntityTest;

class FeesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => 1, "fee_position" => "F001", "fee_position_name" => "Consultation Fee"],
                ["id" => 2, "fee_position" => "F002", "fee_position_name" => "Processing Fee"],
            ],
        ];
        $collection = new Fees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Fee::class, $collection->getValues()[0]);
    }
}
