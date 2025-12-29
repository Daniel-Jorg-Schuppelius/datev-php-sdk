<?php

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformations;
use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformation;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AdditionalInformationsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["additional_information_type" => "20", "additional_information_content" => "Kostenstelle A"],
                ["additional_information_type" => "21", "additional_information_content" => "Projekt B"]
            ]
        ];
        $collection = new AdditionalInformations($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AdditionalInformation::class, $collection->getValues()[0]);
    }
}
