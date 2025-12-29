<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CountryCodes\CountryCodes;
use Datev\Entities\ClientMasterData\CountryCodes\CountryCode;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CountryCodesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "DE", "name" => "Germany"],
                ["id" => "AT", "name" => "Austria"]
            ]
        ];
        $collection = new CountryCodes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CountryCode::class, $collection->getValues()[0]);
    }
}
