<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\FeeVersions\FeeVersions;
use Datev\Entities\Law\FeeVersions\FeeVersion;

class FeeVersionsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "name" => "Version 1.0"],
                ["id" => 2, "name" => "Version 2.0"]
            ]
        ];
        $collection = new FeeVersions($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FeeVersion::class, $collection->getValues()[0]);
    }
}
