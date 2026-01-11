<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\SecureAreas\SecureAreas;
use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;

class SecureAreasTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sa-1", "name" => "Confidential"],
                ["id" => "sa-2", "name" => "Public"]
            ]
        ];
        $collection = new SecureAreas($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SecureArea::class, $collection->getValues()[0]);
    }
}
