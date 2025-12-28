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

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ScimBulk;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ScimBulkTest extends TestCase {
    public function testCreateScimBulk(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "supported" => true,
            "max_operations" => 1000,
            "max_payload_size" => 1048576
        ];

        $bulk = new ScimBulk($data, $logger);

        $this->assertInstanceOf(ScimBulk::class, $bulk);
        $this->assertTrue($bulk->isSupported());
        $this->assertEquals(1000, $bulk->getMaxOperations());
        $this->assertEquals(1048576, $bulk->getMaxPayloadSize());
    }

    public function testUnsupportedScimBulk(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "supported" => false
        ];

        $bulk = new ScimBulk($data, $logger);

        $this->assertFalse($bulk->isSupported());
        $this->assertNull($bulk->getMaxOperations());
    }
}
