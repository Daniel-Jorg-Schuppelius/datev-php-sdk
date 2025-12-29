<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ShortNames\ShortNames;
use Datev\Entities\ClientMasterData\ShortNames\ShortName;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ShortNamesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sn-1", "short_name" => "ABC"],
                ["id" => "sn-2", "short_name" => "XYZ"]
            ]
        ];
        $collection = new ShortNames($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(ShortName::class, $collection->getValues()[0]);
    }
}
