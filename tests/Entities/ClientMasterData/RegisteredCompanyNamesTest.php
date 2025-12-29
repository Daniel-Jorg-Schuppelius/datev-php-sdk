<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyNames;
use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyName;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class RegisteredCompanyNamesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rcn-1", "name" => "Registered Company ABC"],
                ["id" => "rcn-2", "name" => "Registered Company XYZ"]
            ]
        ];
        $collection = new RegisteredCompanyNames($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RegisteredCompanyName::class, $collection->getValues()[0]);
    }
}
