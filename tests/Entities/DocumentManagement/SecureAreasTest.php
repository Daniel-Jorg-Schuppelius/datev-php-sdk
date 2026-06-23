<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\SecureAreas\{SecureArea, SecureAreas};
use Tests\Contracts\EntityTest;

class SecureAreasTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "sa-1", "name" => "Confidential"],
                ["id" => "sa-2", "name" => "Public"],
            ],
        ];
        $collection = new SecureAreas($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SecureArea::class, $collection->getValues()[0]);
    }
}
