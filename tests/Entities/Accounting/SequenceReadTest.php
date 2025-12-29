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

use Datev\Entities\Accounting\SequenceReads\SequenceRead;
use Datev\Entities\Accounting\SequenceReads\SequenceReads;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class SequenceReadTest extends TestCase {
    public function testCreateSequenceRead() {
        $data = [
            "id" => 1,
            "date_from" => "2025-01-01",
            "date_to" => "2025-12-31",
            "description" => "Annual Sequence",
            "is_committed" => false,
            "record_type" => "financial_accounting"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $sequence = new SequenceRead($data, $logger);

        $this->assertInstanceOf(SequenceRead::class, $sequence);
        $this->assertNotNull($sequence->getID());
    }

    public function testCreateSequenceReads() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "date_from" => "2025-01-01",
                    "date_to" => "2025-06-30",
                    "description" => "First Half"
                ],
                [
                    "id" => 2,
                    "date_from" => "2025-07-01",
                    "date_to" => "2025-12-31",
                    "description" => "Second Half"
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $sequences = new SequenceReads($data, $logger);

        $this->assertInstanceOf(SequenceReads::class, $sequences);
        $this->assertCount(2, $sequences->getValues());
    }
}
