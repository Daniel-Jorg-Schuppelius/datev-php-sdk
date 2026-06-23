<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\ClientGroups\{ClientGroup, ClientGroups};
use Tests\Contracts\EntityTest;

class ClientGroupsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cg-1", "group_name" => "Group A", "client_name" => "Client 1"],
                ["id" => "cg-2", "group_name" => "Group B", "client_name" => "Client 2"],
            ],
        ];
        $collection = new ClientGroups($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ClientGroup::class, $collection->getValues()[0]);
    }
}
