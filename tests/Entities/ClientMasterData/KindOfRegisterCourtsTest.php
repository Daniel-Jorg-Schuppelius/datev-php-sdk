<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourts;
use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourt;

class KindOfRegisterCourtsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "korc-1", "kind" => "HRB", "description" => "Handelsregister B"],
                ["id" => "korc-2", "kind" => "HRA", "description" => "Handelsregister A"]
            ]
        ];
        $collection = new KindOfRegisterCourts($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(KindOfRegisterCourt::class, $collection->getValues()[0]);
    }
}
