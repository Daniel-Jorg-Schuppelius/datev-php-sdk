<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PartyRoleTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\PartyRoles\PartyRole;
use Datev\Entities\Law\PartyRoles\PartyRoles;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class PartyRoleTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreatePartyRole(): void {
        $data = [
            "id" => "test-id",
            "number" => 1,
            "type" => "plaintiff",
            "short_name" => "KL",
            "name" => "Kläger"
        ];

        $partyRole = new PartyRole($data, $this->logger);

        $this->assertInstanceOf(PartyRole::class, $partyRole);
        $this->assertEquals(1, $partyRole->getNumber());
        $this->assertEquals("plaintiff", $partyRole->getType());
        $this->assertEquals("KL", $partyRole->getShortName());
        $this->assertEquals("Kläger", $partyRole->getName());
    }

    public function testCreatePartyRoles(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "short_name" => "KL",
                    "name" => "Kläger"
                ],
                [
                    "id" => "test-id-2",
                    "short_name" => "BK",
                    "name" => "Beklagter"
                ]
            ]
        ];

        $partyRoles = new PartyRoles($data, $this->logger);

        $this->assertInstanceOf(PartyRoles::class, $partyRoles);
        $this->assertCount(2, $partyRoles);
    }
}
