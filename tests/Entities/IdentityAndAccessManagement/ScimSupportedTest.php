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
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ScimSupportedTest extends TestCase {
    public function testCreateScimSupported(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "supported" => true
        ];

        $supported = new ScimSupported($data, $logger);

        $this->assertInstanceOf(ScimSupported::class, $supported);
        $this->assertTrue($supported->isSupported());
    }

    public function testScimNotSupported(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "supported" => false
        ];

        $supported = new ScimSupported($data, $logger);

        $this->assertFalse($supported->isSupported());
    }
}
