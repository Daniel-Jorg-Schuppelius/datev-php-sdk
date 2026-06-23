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

use Datev\Entities\IdentityAndAccessManagement\Schemas\{ScimSchema, ScimSchemas};
use Tests\Contracts\EntityTest;

class ScimSchemaTest extends EntityTest {
    public function test_create_scim_schema() {
        $data = [
            "id" => "urn:ietf:params:scim:schemas:core:2.0:User",
            "name" => "User",
            "description" => "User Schema",
        ];
        $schema = new ScimSchema($data);

        $this->assertInstanceOf(ScimSchema::class, $schema);
        $this->assertEquals("urn:ietf:params:scim:schemas:core:2.0:User", $schema->getID());
        $this->assertEquals("User", $schema->getName());
    }

    public function test_create_scim_schemas() {
        $data = [
            "Resources" => [
                [
                    "id" => "urn:ietf:params:scim:schemas:core:2.0:User",
                    "name" => "User",
                ],
            ],
        ];
        $schemas = new ScimSchemas($data);

        $this->assertInstanceOf(ScimSchemas::class, $schemas);
        $this->assertGreaterThanOrEqual(1, count($schemas->getValues()));
    }
}
