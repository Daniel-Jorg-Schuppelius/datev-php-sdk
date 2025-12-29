<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\FeeVersions\FeeVersions;
use Datev\Entities\Law\FeeVersions\FeeVersion;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FeeVersionsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => 1, "name" => "Version 1.0"],
                ["id" => 2, "name" => "Version 2.0"]
            ]
        ];
        $collection = new FeeVersions($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FeeVersion::class, $collection->getValues()[0]);
    }
}
