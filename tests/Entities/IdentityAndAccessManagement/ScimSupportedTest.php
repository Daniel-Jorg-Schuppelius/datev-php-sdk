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

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ScimSupported;

class ScimSupportedTest extends EntityTest {
    public function testCreateScimSupported(): void {
        $data = [
            "supported" => true
        ];

        $supported = new ScimSupported($data);

        $this->assertInstanceOf(ScimSupported::class, $supported);
        $this->assertTrue($supported->isSupported());
    }

    public function testScimNotSupported(): void {
        $data = [
            "supported" => false
        ];

        $supported = new ScimSupported($data);

        $this->assertFalse($supported->isSupported());
    }
}
