<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceVersionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Versions\ResourceVersion;

class ResourceVersionTest extends EntityTest {
    public function testCreateFromString(): void {
        $version = new ResourceVersion("3.1.4");

        $this->assertEquals("3.1.4", $version->getValue());
        $this->assertEquals('resource_version', $version->getEntityName());
    }
}
