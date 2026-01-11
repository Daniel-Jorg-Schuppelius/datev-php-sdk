<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Surnames\Surnames;
use Datev\Entities\ClientMasterData\Surnames\Surname;

class SurnamesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sur-1", "surname" => "Müller"],
                ["id" => "sur-2", "surname" => "Schmidt"]
            ]
        ];
        $collection = new Surnames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Surname::class, $collection->getValues()[0]);
    }
}
