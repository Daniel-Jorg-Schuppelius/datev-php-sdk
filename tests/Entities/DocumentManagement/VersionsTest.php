<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Versions\{Version, Versions};
use Tests\Contracts\EntityTest;

class VersionsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["name" => "Version 1", "number" => "1"],
                ["name" => "Version 2", "number" => "2"],
            ],
        ];
        $collection = new Versions($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Version::class, $collection->getValues()[0]);
    }
}
