<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Disabilities\Disabilities;
use Datev\Entities\Payroll\Disabilities\Disability;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DisabilitiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "valid_from" => "2024-01-01", "degree_of_disability" => 50.0, "issuing_authority" => "Versorgungsamt"],
                ["id" => "00002", "valid_from" => "2024-02-01", "degree_of_disability" => 30.0, "issuing_authority" => "Landesamt"]
            ]
        ];
        $collection = new Disabilities($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Disability::class, $collection->getValues()[0]);
    }
}
