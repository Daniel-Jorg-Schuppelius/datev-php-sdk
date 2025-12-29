<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Infos\Infos;
use Datev\Entities\DocumentManagement\Infos\Info;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class InfosTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "info-1", "environment" => "production", "feature" => "DMS"],
                ["id" => "info-2", "environment" => "test", "feature" => "Archive"]
            ]
        ];
        $collection = new Infos($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Info::class, $collection->getValues()[0]);
    }
}
