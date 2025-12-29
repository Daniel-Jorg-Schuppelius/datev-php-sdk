<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\TaxOffices\TaxOffices;
use Datev\Entities\ClientMasterData\TaxOffices\TaxOffice;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class TaxOfficesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "to-1", "tax_office_name" => "Finanzamt München", "tax_office_number" => "9101"],
                ["id" => "to-2", "tax_office_name" => "Finanzamt Berlin", "tax_office_number" => "1101"]
            ]
        ];
        $collection = new TaxOffices($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TaxOffice::class, $collection->getValues()[0]);
    }
}
