<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Fees\Fees;
use Datev\Entities\PublicSector\Fees\Fee;

class FeesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "fee_name" => "Registration Fee", "type_name" => "Standard"],
                ["id" => 2, "fee_name" => "Processing Fee", "type_name" => "Standard"]
            ]
        ];
        $collection = new Fees($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Fee::class, $collection->getValues()[0]);
    }
}
