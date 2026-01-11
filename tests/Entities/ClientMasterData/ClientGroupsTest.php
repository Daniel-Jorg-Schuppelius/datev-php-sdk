<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\ClientGroups\ClientGroups;
use Datev\Entities\ClientMasterData\ClientGroups\ClientGroup;

class ClientGroupsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cg-1", "client_group_type_short_name" => "Group A"],
                ["id" => "cg-2", "client_group_type_short_name" => "Group B"]
            ]
        ];
        $collection = new ClientGroups($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroup::class, $collection->getValues()[0]);
    }
}
