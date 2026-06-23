<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientCategoryTypes\{ClientCategoryType, ClientCategoryTypes};
use Tests\Contracts\EntityTest;

class ClientCategoryTypesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cct-1", "name" => "Type 1"],
                ["id" => "cct-2", "name" => "Type 2"],
            ],
        ];
        $collection = new ClientCategoryTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientCategoryType::class, $collection->getValues()[0]);
    }
}
