<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryTypes;
use Datev\Entities\ClientMasterData\ClientCategoryTypes\ClientCategoryType;

class ClientCategoryTypesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cct-1", "name" => "Type 1"],
                ["id" => "cct-2", "name" => "Type 2"]
            ]
        ];
        $collection = new ClientCategoryTypes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientCategoryType::class, $collection->getValues()[0]);
    }
}
