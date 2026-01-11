<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimBulkTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ScimBulk;

class ScimBulkTest extends EntityTest {
    public function testCreateScimBulk(): void {
        $data = [
            "supported" => true,
            "max_operations" => 1000,
            "max_payload_size" => 1048576
        ];

        $bulk = new ScimBulk($data);

        $this->assertInstanceOf(ScimBulk::class, $bulk);
        $this->assertTrue($bulk->isSupported());
        $this->assertEquals(1000, $bulk->getMaxOperations());
        $this->assertEquals(1048576, $bulk->getMaxPayloadSize());
    }

    public function testUnsupportedScimBulk(): void {
        $data = [
            "supported" => false
        ];

        $bulk = new ScimBulk($data);

        $this->assertFalse($bulk->isSupported());
        $this->assertNull($bulk->getMaxOperations());
    }
}
