<?php

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\OrderManagement\SelfClients\SelfClients;
use Datev\Entities\OrderManagement\SelfClients\SelfClient;

class SelfClientsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sc-1", "client_name" => "Self Client 1"],
                ["id" => "sc-2", "client_name" => "Self Client 2"]
            ]
        ];
        $collection = new SelfClients($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SelfClient::class, $collection->getValues()[0]);
    }
}
