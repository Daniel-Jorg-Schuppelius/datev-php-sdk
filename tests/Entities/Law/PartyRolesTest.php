<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\PartyRoles\PartyRoles;
use Datev\Entities\Law\PartyRoles\PartyRole;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class PartyRolesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "pr-1", "name" => "Plaintiff", "short_name" => "PLF"],
                ["id" => "pr-2", "name" => "Defendant", "short_name" => "DEF"]
            ]
        ];
        $collection = new PartyRoles($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(PartyRole::class, $collection->getValues()[0]);
    }
}
