<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Taxations\Taxations;
use Datev\Entities\Payroll\Taxations\Taxation;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class TaxationsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "tax_identification_number" => "00123456873", "employment_type" => "hauptarbeitgeber", "is_two_percent_flat_rate_taxation" => false],
                ["id" => "00002", "tax_identification_number" => "00987654321", "employment_type" => "nebenarbeitgeber", "is_two_percent_flat_rate_taxation" => true]
            ]
        ];
        $collection = new Taxations($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Taxation::class, $collection->getValues()[0]);
    }
}
