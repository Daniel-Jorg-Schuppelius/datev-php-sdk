<?php

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Fees\Fees;
use Datev\Entities\PublicSector\Fees\Fee;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FeesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "fee_name" => "Registration Fee", "type_name" => "Standard"],
                ["id" => 2, "fee_name" => "Processing Fee", "type_name" => "Standard"]
            ]
        ];
        $collection = new Fees($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Fee::class, $collection->getValues()[0]);
    }
}
