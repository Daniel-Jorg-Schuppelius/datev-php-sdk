<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RegistrationNumbers\RegistrationNumbers;
use Datev\Entities\ClientMasterData\RegistrationNumbers\RegistrationNumber;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class RegistrationNumbersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rn-1", "number" => "HRB 12345", "court" => "Munich"],
                ["id" => "rn-2", "number" => "HRB 67890", "court" => "Berlin"]
            ]
        ];
        $collection = new RegistrationNumbers($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RegistrationNumber::class, $collection->getValues()[0]);
    }
}
