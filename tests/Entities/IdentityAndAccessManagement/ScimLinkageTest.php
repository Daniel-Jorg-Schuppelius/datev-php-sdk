<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimLinkageTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Users\ScimLinkage;

class ScimLinkageTest extends EntityTest {
    public function testCreateScimLinkage(): void {
        $data = [
            "value" => "user-123-456",
            "display" => "Max Mustermann",
            "ref" => "https://example.com/Users/user-123-456"
        ];

        $linkage = new ScimLinkage($data);

        $this->assertInstanceOf(ScimLinkage::class, $linkage);
        $this->assertEquals("user-123-456", $linkage->getValue());
        $this->assertEquals("Max Mustermann", $linkage->getDisplay());
        $this->assertEquals("https://example.com/Users/user-123-456", $linkage->getRef());
    }
}
