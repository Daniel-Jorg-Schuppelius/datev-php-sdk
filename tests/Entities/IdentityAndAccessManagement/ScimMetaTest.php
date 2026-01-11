<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimMetaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Users\ScimMeta;

class ScimMetaTest extends EntityTest {
    public function testCreateScimMeta(): void {
        $data = [
            "resource_type" => "User",
            "location" => "https://api.datev.de/scim/v2/Users/12345",
            "created" => "2024-01-15T10:00:00.000+00:00",
            "last_modified" => "2024-06-20T14:30:00.000+00:00",
            "version" => "W/\"abc123\""
        ];

        $meta = new ScimMeta($data);

        $this->assertInstanceOf(ScimMeta::class, $meta);
        $this->assertEquals("User", $meta->getResourceType());
        $this->assertEquals("https://api.datev.de/scim/v2/Users/12345", $meta->getLocation());
        $this->assertNotNull($meta->getCreated());
        $this->assertNotNull($meta->getLastModified());
        $this->assertEquals("W/\"abc123\"", $meta->getVersion());
    }
}
