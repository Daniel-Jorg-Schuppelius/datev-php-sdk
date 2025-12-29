<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SequencesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\Sequences\Sequences;
use Datev\Entities\Accounting\Sequences\Sequence;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SequencesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "description" => "Bankbuchungen",
                    "date_from" => "2024-01-01",
                    "is_committed" => true
                ],
                [
                    "description" => "Kassenbuchungen",
                    "date_from" => "2024-01-01",
                    "is_committed" => false
                ]
            ]
        ];

        $sequences = new Sequences($data, $this->logger);

        $this->assertCount(2, $sequences->getValues());
        $this->assertInstanceOf(Sequence::class, $sequences->getValues()[0]);
    }
}
