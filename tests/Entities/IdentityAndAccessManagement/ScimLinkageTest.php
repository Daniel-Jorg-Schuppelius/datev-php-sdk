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

use Datev\Entities\IdentityAndAccessManagement\Users\ScimLinkage;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ScimLinkageTest extends TestCase {
    public function testCreateScimLinkage(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "value" => "user-123-456",
            "display" => "Max Mustermann",
            "ref" => "https://example.com/Users/user-123-456"
        ];

        $linkage = new ScimLinkage($data, $logger);

        $this->assertInstanceOf(ScimLinkage::class, $linkage);
        $this->assertEquals("user-123-456", $linkage->getValue());
        $this->assertEquals("Max Mustermann", $linkage->getDisplay());
        $this->assertEquals("https://example.com/Users/user-123-456", $linkage->getRef());
    }
}
