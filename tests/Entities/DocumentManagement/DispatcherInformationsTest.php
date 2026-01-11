<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformations;
use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformation;

class DispatcherInformationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["external_id" => "ext-1", "application" => "DATEV", "comment" => "Import 1"],
                ["external_id" => "ext-2", "application" => "ERP", "comment" => "Import 2"]
            ]
        ];
        $collection = new DispatcherInformations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(DispatcherInformation::class, $collection->getValues()[0]);
    }
}
