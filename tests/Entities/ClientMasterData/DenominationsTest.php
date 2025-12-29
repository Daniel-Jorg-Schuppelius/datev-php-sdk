<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Denominations\Denominations;
use Datev\Entities\ClientMasterData\Denominations\Denomination;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DenominationsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "den-1", "name" => "Denomination 1"],
                ["id" => "den-2", "name" => "Denomination 2"]
            ]
        ];
        $collection = new Denominations($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Denomination::class, $collection->getValues()[0]);
    }
}
