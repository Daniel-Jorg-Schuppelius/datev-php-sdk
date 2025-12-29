<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\BillingCategories\BillingCategories;
use Datev\Entities\Law\BillingCategories\BillingCategory;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BillingCategoriesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["number" => 1, "name" => "Hourly"],
                ["number" => 2, "name" => "Fixed"]
            ]
        ];
        $collection = new BillingCategories($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(BillingCategory::class, $collection->getValues()[0]);
    }
}
