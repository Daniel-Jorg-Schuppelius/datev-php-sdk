<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Infos\{Info, Infos};
use Tests\Contracts\EntityTest;

class InfosTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "info-1", "environment" => "production", "feature" => "DMS"],
                ["id" => "info-2", "environment" => "test", "feature" => "Archive"],
            ],
        ];
        $collection = new Infos($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Info::class, $collection->getValues()[0]);
    }
}
