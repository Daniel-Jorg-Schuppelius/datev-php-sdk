<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\FiscalYears\FiscalYears;
use Datev\Entities\ClientMasterData\FiscalYears\FiscalYear;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FiscalYearsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "fy-1", "year" => 2023, "start_date" => "2023-01-01", "end_date" => "2023-12-31"],
                ["id" => "fy-2", "year" => 2024, "start_date" => "2024-01-01", "end_date" => "2024-12-31"]
            ]
        ];
        $collection = new FiscalYears($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(FiscalYear::class, $collection->getValues()[0]);
    }
}
