<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\MaritalStatuses\{MaritalStatus, MaritalStatuses};
use Tests\Contracts\EntityTest;

class MaritalStatusesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ms-1", "status" => "SINGLE"],
                ["id" => "ms-2", "status" => "MARRIED"],
            ],
        ];
        $collection = new MaritalStatuses($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MaritalStatus::class, $collection->getValues()[0]);
    }
}
