<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\FeeVersions\{FeeVersion, FeeVersions};
use Tests\Contracts\EntityTest;

class FeeVersionsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => 1, "name" => "Version 1.0"],
                ["id" => 2, "name" => "Version 2.0"],
            ],
        ];
        $collection = new FeeVersions($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FeeVersion::class, $collection->getValues()[0]);
    }
}
