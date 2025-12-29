<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\HourlyWages\HourlyWages;
use Datev\Entities\Payroll\HourlyWages\HourlyWage;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class HourlyWagesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "1", "personnel_number" => "00001", "amount" => 25.50],
                ["id" => "2", "personnel_number" => "00002", "amount" => 30.00]
            ]
        ];
        $collection = new HourlyWages($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(HourlyWage::class, $collection->getValues()[0]);
    }
}
