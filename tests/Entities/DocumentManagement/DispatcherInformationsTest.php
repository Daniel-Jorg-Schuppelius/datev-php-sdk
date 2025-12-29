<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformations;
use Datev\Entities\DocumentManagement\DispatcherInformations\DispatcherInformation;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DispatcherInformationsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["external_id" => "ext-1", "application" => "DATEV", "comment" => "Import 1"],
                ["external_id" => "ext-2", "application" => "ERP", "comment" => "Import 2"]
            ]
        ];
        $collection = new DispatcherInformations($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(DispatcherInformation::class, $collection->getValues()[0]);
    }
}
