<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SequenceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Sequences\Sequence;
use Datev\Entities\Accounting\Sequences\Sequences;

class SequenceTest extends EntityTest {
    public function testCreateSequence() {
        $data = [
            "application_information" => "DATEV SDK",
            "date_from" => "2024-01-01T00:00:00.000+00:00",
            "date_to" => "2024-01-31T00:00:00.000+00:00",
            "description" => "Buchungsstapel Januar 2024",
            "initials" => "DJS",
            "is_committed" => false
        ];

        $sequence = new Sequence($data);
        $this->assertInstanceOf(Sequence::class, new Sequence());
        $this->assertInstanceOf(Sequence::class, $sequence);
    }

    public function testCreateSequences() {
        $data = [
            "content" => [
                [
                    "date_from" => "2024-01-01T00:00:00.000+00:00",
                    "date_to" => "2024-01-31T00:00:00.000+00:00",
                    "description" => "Stapel 1",
                    "is_committed" => true
                ],
                [
                    "date_from" => "2024-02-01T00:00:00.000+00:00",
                    "date_to" => "2024-02-28T00:00:00.000+00:00",
                    "description" => "Stapel 2",
                    "is_committed" => false
                ]
            ]
        ];

        $sequences = new Sequences($data);
        $this->assertInstanceOf(Sequences::class, $sequences);
        $this->assertCount(2, $sequences->getValues());
    }
}
