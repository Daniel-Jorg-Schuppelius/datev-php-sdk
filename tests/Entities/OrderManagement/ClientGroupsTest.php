<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\ClientGroups\ClientGroups;
use Datev\Entities\OrderManagement\ClientGroups\ClientGroup;

class ClientGroupsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cg-1", "group_name" => "Group A", "client_name" => "Client 1"],
                ["id" => "cg-2", "group_name" => "Group B", "client_name" => "Client 2"]
            ]
        ];
        $collection = new ClientGroups($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroup::class, $collection->getValues()[0]);
    }
}
