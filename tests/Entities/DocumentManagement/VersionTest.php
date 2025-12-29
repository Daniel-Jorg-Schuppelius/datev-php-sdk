<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VersionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Versions\Version;
use Datev\Entities\DocumentManagement\Versions\Versions;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class VersionTest extends TestCase {
    public function testCreateVersion(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "name" => "Initiale Version",
            "number" => "1.0"
        ];

        $version = new Version($data, $logger);

        $this->assertInstanceOf(Version::class, $version);
        $this->assertEquals("Initiale Version", $version->getName());
        $this->assertEquals("1.0", $version->getNumber());
    }

    public function testCreateVersions(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "name" => "Initiale Version",
                    "number" => "1.0"
                ],
                [
                    "name" => "Aktualisierte Version",
                    "number" => "2.0"
                ]
            ]
        ];

        $versions = new Versions($data, $logger);

        $this->assertInstanceOf(Versions::class, $versions);
        $this->assertCount(2, $versions);
        $this->assertInstanceOf(Version::class, $versions->getValues()[0]);
    }
}
