<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\SecurityZones\SecurityZones;
use Datev\Entities\Law\SecurityZones\SecurityZone;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SecurityZonesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sz-1", "name" => "Public", "short_name" => "PUB"],
                ["id" => "sz-2", "name" => "Confidential", "short_name" => "CONF"]
            ]
        ];
        $collection = new SecurityZones($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SecurityZone::class, $collection->getValues()[0]);
    }
}
