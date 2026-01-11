<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurposes;
use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurpose;

class EnterprisePurposesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ep-1", "purpose" => "Manufacturing"],
                ["id" => "ep-2", "purpose" => "Trading"]
            ]
        ];
        $collection = new EnterprisePurposes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(EnterprisePurpose::class, $collection->getValues()[0]);
    }
}
