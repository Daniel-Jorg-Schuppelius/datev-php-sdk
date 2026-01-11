<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Considerations\Considerations;
use Datev\Entities\ClientMasterData\Considerations\Consideration;

class ConsiderationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "con-1", "name" => "Consideration 1"],
                ["id" => "con-2", "name" => "Consideration 2"]
            ]
        ];
        $collection = new Considerations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Consideration::class, $collection->getValues()[0]);
    }
}
