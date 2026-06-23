<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\SelfClients\{SelfClient, SelfClients};
use Tests\Contracts\EntityTest;

class SelfClientsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "sc-1", "client_name" => "Self Client 1"],
                ["id" => "sc-2", "client_name" => "Self Client 2"],
            ],
        ];
        $collection = new SelfClients($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SelfClient::class, $collection->getValues()[0]);
    }
}
