<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Infos\Infos;
use Datev\Entities\DocumentManagement\Infos\Info;

class InfosTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "info-1", "environment" => "production", "feature" => "DMS"],
                ["id" => "info-2", "environment" => "test", "feature" => "Archive"]
            ]
        ];
        $collection = new Infos($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Info::class, $collection->getValues()[0]);
    }
}
