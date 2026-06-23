<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkedIdentityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Users\LinkedIdentity;
use Tests\Contracts\EntityTest;

class LinkedIdentityTest extends EntityTest {
    public function test_create_linked_identity(): void {
        $data = [
            "value" => "DOMAIN\\username",
        ];

        $identity = new LinkedIdentity($data);

        $this->assertInstanceOf(LinkedIdentity::class, $identity);
        $this->assertEquals("DOMAIN\\username", $identity->getValue());
    }
}
