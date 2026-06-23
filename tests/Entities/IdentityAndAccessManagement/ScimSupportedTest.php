<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimSupportedTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ScimSupported;
use Tests\Contracts\EntityTest;

class ScimSupportedTest extends EntityTest {
    public function test_create_scim_supported(): void {
        $data = [
            "supported" => true,
        ];

        $supported = new ScimSupported($data);

        $this->assertInstanceOf(ScimSupported::class, $supported);
        $this->assertTrue($supported->isSupported());
    }

    public function test_scim_not_supported(): void {
        $data = [
            "supported" => false,
        ];

        $supported = new ScimSupported($data);

        $this->assertFalse($supported->isSupported());
    }
}
