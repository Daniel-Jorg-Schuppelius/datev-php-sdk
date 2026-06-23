<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Files\{LawFile, LawFiles};
use Tests\Contracts\EntityTest;

class FilesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "file-1", "file_name" => "Case File 1", "file_number" => "2024-001"],
                ["id" => "file-2", "file_name" => "Case File 2", "file_number" => "2024-002"],
            ],
        ];
        $collection = new LawFiles($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(LawFile::class, $collection->getValues()[0]);
    }
}
