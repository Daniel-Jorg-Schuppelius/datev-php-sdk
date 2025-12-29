<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\States\States;
use Datev\Entities\DocumentManagement\States\State;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class StatesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "state-1", "name" => "Draft"],
                ["id" => "state-2", "name" => "Approved"]
            ]
        ];
        $collection = new States($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(State::class, $collection->getValues()[0]);
    }
}
