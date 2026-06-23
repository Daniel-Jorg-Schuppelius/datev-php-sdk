<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\KindOfRegisterCourts\{KindOfRegisterCourt, KindOfRegisterCourts};
use Tests\Contracts\EntityTest;

class KindOfRegisterCourtsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "korc-1", "kind" => "HRB", "description" => "Handelsregister B"],
                ["id" => "korc-2", "kind" => "HRA", "description" => "Handelsregister A"],
            ],
        ];
        $collection = new KindOfRegisterCourts($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(KindOfRegisterCourt::class, $collection->getValues()[0]);
    }
}
