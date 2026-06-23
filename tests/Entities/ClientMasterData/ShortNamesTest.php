<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ShortNames\{ShortName, ShortNames};
use Tests\Contracts\EntityTest;

class ShortNamesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "sn-1", "short_name" => "ABC"],
                ["id" => "sn-2", "short_name" => "XYZ"],
            ],
        ];
        $collection = new ShortNames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ShortName::class, $collection->getValues()[0]);
    }
}
