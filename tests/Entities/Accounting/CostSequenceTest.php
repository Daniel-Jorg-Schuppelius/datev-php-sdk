<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostSequenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostSequences\{CostSequence, CostSequences};
use Tests\Contracts\EntityTest;

class CostSequenceTest extends EntityTest {
    public function test_create_cost_sequence() {
        $data = [
            "id" => 1,
            "description" => "Kostenstapel Januar 2024",
            "date_from" => "2024-01-01T00:00:00.000+00:00",
            "date_to" => "2024-01-31T00:00:00.000+00:00",
            "initials" => "DJS",
            "is_committed" => false,
        ];

        $costSequence = new CostSequence($data);
        $this->assertInstanceOf(CostSequence::class, new CostSequence);
        $this->assertInstanceOf(CostSequence::class, $costSequence);
        $this->assertEquals("Kostenstapel Januar 2024", $costSequence->getDescription());
        $this->assertEquals("DJS", $costSequence->getInitials());
        $this->assertFalse($costSequence->isCommitted());
    }

    public function test_create_cost_sequences() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "description" => "Kostenstapel 1",
                    "is_committed" => true,
                ],
                [
                    "id" => 2,
                    "description" => "Kostenstapel 2",
                    "is_committed" => false,
                ],
            ],
        ];

        $costSequences = new CostSequences($data);
        $this->assertInstanceOf(CostSequences::class, $costSequences);
        $this->assertCount(2, $costSequences->getValues());
    }
}
