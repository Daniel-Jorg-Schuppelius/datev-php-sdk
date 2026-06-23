<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\EnterprisePurposes\{EnterprisePurpose, EnterprisePurposes};
use Tests\Contracts\EntityTest;

class EnterprisePurposesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "ep-1", "purpose" => "Manufacturing"],
                ["id" => "ep-2", "purpose" => "Trading"],
            ],
        ];
        $collection = new EnterprisePurposes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(EnterprisePurpose::class, $collection->getValues()[0]);
    }
}
