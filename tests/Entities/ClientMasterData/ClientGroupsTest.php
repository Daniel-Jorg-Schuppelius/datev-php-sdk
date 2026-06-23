<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ClientGroups\{ClientGroup, ClientGroups};
use Tests\Contracts\EntityTest;

class ClientGroupsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cg-1", "client_group_type_short_name" => "Group A"],
                ["id" => "cg-2", "client_group_type_short_name" => "Group B"],
            ],
        ];
        $collection = new ClientGroups($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroup::class, $collection->getValues()[0]);
    }
}
