<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\SecureAreas\SecureAreas;
use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SecureAreasTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "sa-1", "name" => "Confidential"],
                ["id" => "sa-2", "name" => "Public"]
            ]
        ];
        $collection = new SecureAreas($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(SecureArea::class, $collection->getValues()[0]);
    }
}
