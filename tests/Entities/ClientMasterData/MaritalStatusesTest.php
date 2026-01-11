<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatuses;
use Datev\Entities\ClientMasterData\MaritalStatuses\MaritalStatus;

class MaritalStatusesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ms-1", "status" => "SINGLE"],
                ["id" => "ms-2", "status" => "MARRIED"]
            ]
        ];
        $collection = new MaritalStatuses($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(MaritalStatus::class, $collection->getValues()[0]);
    }
}
