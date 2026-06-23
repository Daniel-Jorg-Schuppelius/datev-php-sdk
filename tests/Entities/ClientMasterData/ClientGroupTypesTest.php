<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientGroupTypes\{ClientGroupType, ClientGroupTypes};
use Tests\Contracts\EntityTest;

class ClientGroupTypesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cgt-1", "name" => "Group Type 1"],
                ["id" => "cgt-2", "name" => "Group Type 2"],
            ],
        ];
        $collection = new ClientGroupTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroupType::class, $collection->getValues()[0]);
    }
}
