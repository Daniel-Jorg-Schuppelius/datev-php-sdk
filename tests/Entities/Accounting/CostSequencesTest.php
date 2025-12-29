<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\CostSequences\CostSequences;
use Datev\Entities\Accounting\CostSequences\CostSequence;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CostSequencesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "seq-1", "description" => "Kostensequenz Januar", "date_from" => "2024-01-01T00:00:00+01:00", "is_committed" => false],
                ["id" => "seq-2", "description" => "Kostensequenz Februar", "date_from" => "2024-02-01T00:00:00+01:00", "is_committed" => true]
            ]
        ];
        $collection = new CostSequences($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CostSequence::class, $collection->getValues()[0]);
    }
}
