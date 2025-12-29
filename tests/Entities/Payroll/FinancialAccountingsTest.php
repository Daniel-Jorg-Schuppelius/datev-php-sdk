<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\FinancialAccountings\FinancialAccountings;
use Datev\Entities\Payroll\FinancialAccountings\FinancialAccounting;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FinancialAccountingsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "45200", "different_consultant_number" => "12345", "different_client_number" => "54321"],
                ["id" => "45201", "different_consultant_number" => "67890", "different_client_number" => "09876"]
            ]
        ];
        $collection = new FinancialAccountings($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FinancialAccounting::class, $collection->getValues()[0]);
    }
}
