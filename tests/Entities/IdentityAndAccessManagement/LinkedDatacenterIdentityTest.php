<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LinkedDatacenterIdentityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Users\LinkedDatacenterIdentity;

class LinkedDatacenterIdentityTest extends EntityTest {
    public function testCreateLinkedDatacenterIdentity(): void {
        $data = [
            "value" => 12345
        ];

        $identity = new LinkedDatacenterIdentity($data);

        $this->assertInstanceOf(LinkedDatacenterIdentity::class, $identity);
        $this->assertEquals(12345, $identity->getValue());
    }

    public function testNullValue(): void {
        $data = [];

        $identity = new LinkedDatacenterIdentity($data);

        $this->assertNull($identity->getValue());
    }
}
