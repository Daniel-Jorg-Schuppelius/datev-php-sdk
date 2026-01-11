<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\SecurityZones\SecurityZones;
use Datev\Entities\Law\SecurityZones\SecurityZone;

class SecurityZonesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sz-1", "name" => "Public", "short_name" => "PUB"],
                ["id" => "sz-2", "name" => "Confidential", "short_name" => "CONF"]
            ]
        ];
        $collection = new SecurityZones($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SecurityZone::class, $collection->getValues()[0]);
    }
}
