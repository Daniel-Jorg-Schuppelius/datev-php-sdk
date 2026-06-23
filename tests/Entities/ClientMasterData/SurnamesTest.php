<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Surnames\{Surname, Surnames};
use Tests\Contracts\EntityTest;

class SurnamesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "sur-1", "surname" => "Müller"],
                ["id" => "sur-2", "surname" => "Schmidt"],
            ],
        ];
        $collection = new Surnames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Surname::class, $collection->getValues()[0]);
    }
}
