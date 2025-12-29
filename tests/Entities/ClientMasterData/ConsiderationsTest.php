<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Considerations\Considerations;
use Datev\Entities\ClientMasterData\Considerations\Consideration;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ConsiderationsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "con-1", "name" => "Consideration 1"],
                ["id" => "con-2", "name" => "Consideration 2"]
            ]
        ];
        $collection = new Considerations($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Consideration::class, $collection->getValues()[0]);
    }
}
