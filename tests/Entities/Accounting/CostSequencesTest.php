<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\CostSequences\CostSequences;
use Datev\Entities\Accounting\CostSequences\CostSequence;

class CostSequencesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "seq-1", "description" => "Kostensequenz Januar", "date_from" => "2024-01-01T00:00:00+01:00", "is_committed" => false],
                ["id" => "seq-2", "description" => "Kostensequenz Februar", "date_from" => "2024-02-01T00:00:00+01:00", "is_committed" => true]
            ]
        ];
        $collection = new CostSequences($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostSequence::class, $collection->getValues()[0]);
    }
}
