<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourts;
use Datev\Entities\ClientMasterData\KindOfRegisterCourts\KindOfRegisterCourt;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class KindOfRegisterCourtsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "korc-1", "kind" => "HRB", "description" => "Handelsregister B"],
                ["id" => "korc-2", "kind" => "HRA", "description" => "Handelsregister A"]
            ]
        ];
        $collection = new KindOfRegisterCourts($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(KindOfRegisterCourt::class, $collection->getValues()[0]);
    }
}
