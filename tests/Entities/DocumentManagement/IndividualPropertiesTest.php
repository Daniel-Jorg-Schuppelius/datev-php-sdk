<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperty;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class IndividualPropertiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ip-1", "data_name" => "prop1", "display_name" => "Custom Property 1"],
                ["id" => "ip-2", "data_name" => "prop2", "display_name" => "Custom Property 2"]
            ]
        ];
        $collection = new IndividualProperties($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(IndividualProperty::class, $collection->getValues()[0]);
    }
}
