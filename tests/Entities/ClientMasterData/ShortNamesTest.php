<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\ShortNames\ShortNames;
use Datev\Entities\ClientMasterData\ShortNames\ShortName;

class ShortNamesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sn-1", "short_name" => "ABC"],
                ["id" => "sn-2", "short_name" => "XYZ"]
            ]
        ];
        $collection = new ShortNames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ShortName::class, $collection->getValues()[0]);
    }
}
