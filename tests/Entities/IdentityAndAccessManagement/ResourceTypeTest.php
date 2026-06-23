<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Schemas\{ResourceType, ResourceTypes};
use Tests\Contracts\EntityTest;

class ResourceTypeTest extends EntityTest {
    public function test_create_resource_type() {
        $data = [
            "id" => "User",
            "name" => "User",
            "description" => "User Account",
            "endpoint" => "/Users",
            "schema" => "urn:ietf:params:scim:schemas:core:2.0:User",
            "schema_extensions" => [],
            "meta" => [],
        ];
        $resourceType = new ResourceType($data);

        $this->assertInstanceOf(ResourceType::class, $resourceType);
        $this->assertEquals("User", $resourceType->getID());
        $this->assertEquals("User", $resourceType->getName());
        $this->assertEquals("User Account", $resourceType->getDescription());
        $this->assertEquals("/Users", $resourceType->getEndpoint());
        $this->assertEquals("urn:ietf:params:scim:schemas:core:2.0:User", $resourceType->getSchema());
    }

    public function test_create_resource_types() {
        $data = [
            "Resources" => [
                [
                    "id" => "User",
                    "name" => "User",
                    "description" => "User Account",
                    "endpoint" => "/Users",
                    "schema" => "urn:ietf:params:scim:schemas:core:2.0:User",
                    "schema_extensions" => [],
                    "meta" => [],
                ],
            ],
        ];
        $resourceTypes = new ResourceTypes($data);

        $this->assertInstanceOf(ResourceTypes::class, $resourceTypes);
        $this->assertGreaterThanOrEqual(1, count($resourceTypes->getValues()));
    }
}
