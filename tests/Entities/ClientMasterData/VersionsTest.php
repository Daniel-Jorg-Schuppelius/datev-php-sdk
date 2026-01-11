<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Versions\Versions;
use Datev\Entities\ClientMasterData\Versions\Version;

class VersionsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ver-1", "version" => "1.0.0", "db_version" => "2024.1"],
                ["id" => "ver-2", "version" => "1.1.0", "db_version" => "2024.2"]
            ]
        ];
        $collection = new Versions($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Version::class, $collection->getValues()[0]);
    }
}
