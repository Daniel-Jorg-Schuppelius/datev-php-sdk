<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Addresses\Addresses;
use Datev\Entities\Payroll\Addresses\Address;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AddressesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "street" => "Musterstraße", "house_number" => "123", "city" => "München", "postal_code" => "80331", "country" => "DE"],
                ["id" => "00002", "street" => "Testweg", "house_number" => "45", "city" => "Berlin", "postal_code" => "10115", "country" => "DE"]
            ]
        ];
        $collection = new Addresses($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Address::class, $collection->getValues()[0]);
    }
}
