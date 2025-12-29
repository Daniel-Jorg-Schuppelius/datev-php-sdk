<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use Datev\Entities\DocumentManagement\StructureItems\StructureItem;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class StructureItemsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "si-1", "name" => "Root", "type" => 2],
                ["id" => "si-2", "name" => "Document.pdf", "type" => 1]
            ]
        ];
        $collection = new StructureItems($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(StructureItem::class, $collection->getValues()[0]);
    }
}
