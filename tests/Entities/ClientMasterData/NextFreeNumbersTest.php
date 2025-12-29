<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumbers;
use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumber;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class NextFreeNumbersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "nfn-1", "type" => "CLIENT", "number" => 10001],
                ["id" => "nfn-2", "type" => "ADDRESSEE", "number" => 20001]
            ]
        ];
        $collection = new NextFreeNumbers($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(NextFreeNumber::class, $collection->getValues()[0]);
    }
}
