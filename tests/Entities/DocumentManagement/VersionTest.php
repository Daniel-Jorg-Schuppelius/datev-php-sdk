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

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Versions\Version;
use Datev\Entities\DocumentManagement\Versions\Versions;

class VersionTest extends EntityTest {
    public function testCreateVersion(): void {
        $data = [
            "name" => "Initiale Version",
            "number" => "1.0"
        ];

        $version = new Version($data);

        $this->assertInstanceOf(Version::class, $version);
        $this->assertEquals("Initiale Version", $version->getName());
        $this->assertEquals("1.0", $version->getNumber());
    }

    public function testCreateVersions(): void {
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

        $versions = new Versions($data);

        $this->assertInstanceOf(Versions::class, $versions);
        $this->assertCount(2, $versions);
        $this->assertInstanceOf(Version::class, $versions->getValues()[0]);
    }
}
