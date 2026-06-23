<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\DispatcherInformations\{DispatcherInformation, DispatcherInformations};
use Tests\Contracts\EntityTest;

class DispatcherInformationsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["external_id" => "ext-1", "application" => "DATEV", "comment" => "Import 1"],
                ["external_id" => "ext-2", "application" => "ERP", "comment" => "Import 2"],
            ],
        ];
        $collection = new DispatcherInformations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(DispatcherInformation::class, $collection->getValues()[0]);
    }
}
