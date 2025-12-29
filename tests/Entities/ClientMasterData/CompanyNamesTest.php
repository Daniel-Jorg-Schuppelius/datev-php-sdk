<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CompanyNames\CompanyNames;
use Datev\Entities\ClientMasterData\CompanyNames\CompanyName;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CompanyNamesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cn-1", "name" => "Company ABC GmbH"],
                ["id" => "cn-2", "name" => "Company XYZ AG"]
            ]
        ];
        $collection = new CompanyNames($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CompanyName::class, $collection->getValues()[0]);
    }
}
