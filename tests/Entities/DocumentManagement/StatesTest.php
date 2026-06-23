<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\States\{State, States};
use Tests\Contracts\EntityTest;

class StatesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "state-1", "name" => "Draft"],
                ["id" => "state-2", "name" => "Approved"],
            ],
        ];
        $collection = new States($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(State::class, $collection->getValues()[0]);
    }
}
