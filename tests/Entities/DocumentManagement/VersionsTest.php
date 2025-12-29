<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Versions\Versions;
use Datev\Entities\DocumentManagement\Versions\Version;
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
                ["name" => "Version 1", "number" => "1"],
                ["name" => "Version 2", "number" => "2"]
            ]
        ];
        $collection = new Versions($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Version::class, $collection->getValues()[0]);
    }
}
