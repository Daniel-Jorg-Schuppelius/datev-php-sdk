<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibilities;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibility;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AreaOfResponsibilitiesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "aor-1", "name" => "Accounting", "description" => "Accounting responsibilities"],
                ["id" => "aor-2", "name" => "Payroll", "description" => "Payroll responsibilities"]
            ]
        ];
        $collection = new AreaOfResponsibilities($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AreaOfResponsibility::class, $collection->getValues()[0]);
    }
}
