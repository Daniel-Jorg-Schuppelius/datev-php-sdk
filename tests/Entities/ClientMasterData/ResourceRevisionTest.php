<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceRevisionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Versions\ResourceRevision;

class ResourceRevisionTest extends EntityTest {
    public function testCreateFromString(): void {
        $revision = new ResourceRevision("1.2.3");

        $this->assertEquals("1.2.3", $revision->getValue());
        $this->assertEquals('resource_revision', $revision->getEntityName());
    }
}
