<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplates;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplate;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class PropertyTemplatesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "pt-1", "name" => "Template 1", "document_class" => ["id" => 1, "name" => "Invoice"]],
                ["id" => "pt-2", "name" => "Template 2", "document_class" => ["id" => 2, "name" => "Contract"]]
            ]
        ];
        $collection = new PropertyTemplates($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PropertyTemplate::class, $collection->getValues()[0]);
    }
}
