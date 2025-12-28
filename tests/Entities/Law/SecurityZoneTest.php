<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SecurityZoneTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\SecurityZones\SecurityZone;
use Datev\Entities\Law\SecurityZones\SecurityZones;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SecurityZoneTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateSecurityZone(): void {
        $data = [
            "id" => "test-id",
            "short_name" => "SZ1",
            "name" => "Sicherheitszone 1"
        ];

        $securityZone = new SecurityZone($data, $this->logger);

        $this->assertInstanceOf(SecurityZone::class, $securityZone);
        $this->assertEquals("SZ1", $securityZone->getShortName());
        $this->assertEquals("Sicherheitszone 1", $securityZone->getName());
    }

    public function testCreateSecurityZones(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "short_name" => "SZ1",
                    "name" => "Sicherheitszone 1"
                ],
                [
                    "id" => "test-id-2",
                    "short_name" => "SZ2",
                    "name" => "Sicherheitszone 2"
                ]
            ]
        ];

        $securityZones = new SecurityZones($data, $this->logger);

        $this->assertInstanceOf(SecurityZones::class, $securityZones);
        $this->assertCount(2, $securityZones);
    }
}
