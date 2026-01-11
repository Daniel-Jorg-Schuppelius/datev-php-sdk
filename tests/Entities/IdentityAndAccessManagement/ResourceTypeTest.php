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

use Datev\Entities\IdentityAndAccessManagement\Schemas\ResourceType;
use Datev\Entities\IdentityAndAccessManagement\Schemas\ResourceTypes;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ResourceTypeTest extends TestCase {
    public function testCreateResourceType() {
        $data = [
            "id" => "User",
            "name" => "User",
            "description" => "User Account",
            "endpoint" => "/Users",
            "schema" => "urn:ietf:params:scim:schemas:core:2.0:User",
            "schema_extensions" => [],
            "meta" => []
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $resourceType = new ResourceType($data, $logger);

        $this->assertInstanceOf(ResourceType::class, $resourceType);
        $this->assertEquals("User", $resourceType->getID());
        $this->assertEquals("User", $resourceType->getName());
        $this->assertEquals("User Account", $resourceType->getDescription());
        $this->assertEquals("/Users", $resourceType->getEndpoint());
        $this->assertEquals("urn:ietf:params:scim:schemas:core:2.0:User", $resourceType->getSchema());
    }

    public function testCreateResourceTypes() {
        $data = [
            "Resources" => [
                [
                    "id" => "User",
                    "name" => "User",
                    "description" => "User Account",
                    "endpoint" => "/Users",
                    "schema" => "urn:ietf:params:scim:schemas:core:2.0:User",
                    "schema_extensions" => [],
                    "meta" => []
                ]
            ]
        ];

        $logger = ConsoleLoggerFactory::getLogger();
        $resourceTypes = new ResourceTypes($data, $logger);

        $this->assertInstanceOf(ResourceTypes::class, $resourceTypes);
        $this->assertGreaterThanOrEqual(1, count($resourceTypes->getValues()));
    }
}
