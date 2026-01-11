<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\SequenceReads\SequenceReads;
use Datev\Entities\Accounting\SequenceReads\SequenceRead;

class SequenceReadsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "01-2024/0001", "description" => "Buchungsstapel Januar", "date_from" => "2024-01-01T00:00:00+01:00", "date_to" => "2024-01-31T00:00:00+01:00", "is_committed" => true],
                ["id" => "02-2024/0001", "description" => "Buchungsstapel Februar", "date_from" => "2024-02-01T00:00:00+01:00", "date_to" => "2024-02-29T00:00:00+01:00", "is_committed" => false]
            ]
        ];
        $collection = new SequenceReads($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SequenceRead::class, $collection->getValues()[0]);
    }
}
