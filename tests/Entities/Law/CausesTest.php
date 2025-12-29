<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Causes\Causes;
use Datev\Entities\Law\Causes\Cause;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CausesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cause-1", "name" => "Civil Case"],
                ["id" => "cause-2", "name" => "Criminal Case"]
            ]
        ];
        $collection = new Causes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Cause::class, $collection->getValues()[0]);
    }
}
