<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\AccountingAreas\AccountingAreas;
use Datev\Entities\Law\AccountingAreas\AccountingArea;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AccountingAreasTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "aa-1", "name" => "Area 1", "number" => 1],
                ["id" => "aa-2", "name" => "Area 2", "number" => 2]
            ]
        ];
        $collection = new AccountingAreas($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(AccountingArea::class, $collection->getValues()[0]);
    }
}
