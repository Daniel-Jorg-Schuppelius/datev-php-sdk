<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Notes\Notes;
use Datev\Entities\DocumentManagement\Notes\Note;

class NotesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["text" => "First note", "popup" => true],
                ["text" => "Second note", "popup" => false]
            ]
        ];
        $collection = new Notes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Note::class, $collection->getValues()[0]);
    }
}
