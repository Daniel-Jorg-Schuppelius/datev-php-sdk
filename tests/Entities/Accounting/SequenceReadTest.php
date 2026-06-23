<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SequenceReadTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\SequenceReads\{SequenceRead, SequenceReads};
use Tests\Contracts\EntityTest;

class SequenceReadTest extends EntityTest {
    public function test_create_sequence_read() {
        $data = [
            "id" => 1,
            "date_from" => "2025-01-01",
            "date_to" => "2025-12-31",
            "description" => "Annual Sequence",
            "is_committed" => false,
            "record_type" => "financial_accounting",
        ];
        $sequence = new SequenceRead($data);

        $this->assertInstanceOf(SequenceRead::class, $sequence);
        $this->assertNotNull($sequence->getID());
    }

    public function test_create_sequence_reads() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "date_from" => "2025-01-01",
                    "date_to" => "2025-06-30",
                    "description" => "First Half",
                ],
                [
                    "id" => 2,
                    "date_from" => "2025-07-01",
                    "date_to" => "2025-12-31",
                    "description" => "Second Half",
                ],
            ],
        ];
        $sequences = new SequenceReads($data);

        $this->assertInstanceOf(SequenceReads::class, $sequences);
        $this->assertCount(2, $sequences->getValues());
    }
}
