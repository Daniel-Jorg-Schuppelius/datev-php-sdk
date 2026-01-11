<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimSchemaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Schemas\ScimSchema;
use Datev\Entities\IdentityAndAccessManagement\Schemas\ScimSchemas;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ScimSchemaTest extends TestCase {
    public function testCreateScimSchema() {
        $data = [
            "id" => "urn:ietf:params:scim:schemas:core:2.0:User",
            "name" => "User",
            "description" => "User Schema"
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $schema = new ScimSchema($data, $logger);

        $this->assertInstanceOf(ScimSchema::class, $schema);
        $this->assertEquals("urn:ietf:params:scim:schemas:core:2.0:User", $schema->getID());
        $this->assertEquals("User", $schema->getName());
    }

    public function testCreateScimSchemas() {
        $data = [
            "Resources" => [
                [
                    "id" => "urn:ietf:params:scim:schemas:core:2.0:User",
                    "name" => "User"
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $schemas = new ScimSchemas($data, $logger);

        $this->assertInstanceOf(ScimSchemas::class, $schemas);
        $this->assertGreaterThanOrEqual(1, count($schemas->getValues()));
    }
}
