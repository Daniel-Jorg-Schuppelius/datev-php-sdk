<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Versions\Versions;
use Datev\Entities\ClientMasterData\Versions\Version;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class VersionsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ver-1", "version" => "1.0.0", "db_version" => "2024.1"],
                ["id" => "ver-2", "version" => "1.1.0", "db_version" => "2024.2"]
            ]
        ];
        $collection = new Versions($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Version::class, $collection->getValues()[0]);
    }
}
