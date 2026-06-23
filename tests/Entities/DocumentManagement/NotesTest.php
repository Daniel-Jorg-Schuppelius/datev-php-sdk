<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Notes\{Note, Notes};
use Tests\Contracts\EntityTest;

class NotesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["text" => "First note", "popup" => true],
                ["text" => "Second note", "popup" => false],
            ],
        ];
        $collection = new Notes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Note::class, $collection->getValues()[0]);
    }
}
