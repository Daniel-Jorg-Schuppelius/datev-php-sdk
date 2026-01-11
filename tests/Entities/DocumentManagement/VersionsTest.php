<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Versions\Versions;
use Datev\Entities\DocumentManagement\Versions\Version;

class VersionsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["name" => "Version 1", "number" => "1"],
                ["name" => "Version 2", "number" => "2"]
            ]
        ];
        $collection = new Versions($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Version::class, $collection->getValues()[0]);
    }
}
