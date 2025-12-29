<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SchemaExtensionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Schemas\SchemaExtension;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class SchemaExtensionTest extends TestCase {
    public function testCreateSchemaExtension(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "schema" => "urn:ietf:params:scim:schemas:extension:enterprise:2.0:User",
            "required" => false
        ];

        $extension = new SchemaExtension($data, $logger);

        $this->assertInstanceOf(SchemaExtension::class, $extension);
        $this->assertEquals("urn:ietf:params:scim:schemas:extension:enterprise:2.0:User", $extension->getSchema());
        $this->assertFalse($extension->isRequired());
    }

    public function testRequiredSchemaExtension(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "schema" => "urn:ietf:params:scim:schemas:core:2.0:User",
            "required" => true
        ];

        $extension = new SchemaExtension($data, $logger);

        $this->assertTrue($extension->isRequired());
    }
}
