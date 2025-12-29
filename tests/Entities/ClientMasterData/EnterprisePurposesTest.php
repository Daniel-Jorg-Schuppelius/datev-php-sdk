<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurposes;
use Datev\Entities\ClientMasterData\EnterprisePurposes\EnterprisePurpose;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class EnterprisePurposesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "ep-1", "purpose" => "Manufacturing"],
                ["id" => "ep-2", "purpose" => "Trading"]
            ]
        ];
        $collection = new EnterprisePurposes($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(EnterprisePurpose::class, $collection->getValues()[0]);
    }
}
