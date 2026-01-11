<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\States\States;
use Datev\Entities\DocumentManagement\States\State;

class StatesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "state-1", "name" => "Draft"],
                ["id" => "state-2", "name" => "Approved"]
            ]
        ];
        $collection = new States($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(State::class, $collection->getValues()[0]);
    }
}
