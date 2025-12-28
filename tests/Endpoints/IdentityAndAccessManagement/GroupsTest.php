<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GroupsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\IdentityAndAccessManagement;

use Datev\API\Desktop\Endpoints\IdentityAndAccessManagement\GroupsEndpoint;
use Datev\Entities\IdentityAndAccessManagement\Groups\Group;
use Datev\Entities\IdentityAndAccessManagement\Groups\Groups;
use Datev\Entities\IdentityAndAccessManagement\Groups\GroupID;
use Tests\Contracts\EndpointTest;

class GroupsTest extends EndpointTest {
    protected ?GroupsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new GroupsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true; // API is disabled
    }

    public function testJsonSerialize() {
        $data = [
            "id" => "a077bae8-e669-4b3a-851b-35b2079d2acd",
            "meta" => [
                "resource_type" => "group",
                "location" => "/iam/v1/groups/a077bae8-e669-4b3a-851b-35b2079d2acd"
            ],
            "schemas" => [
                "urn:ietf:params:scim:schemas:core:2.0:Group",
                "urn:ietf:params:scim:schemas:extension:datev:2.0:group"
            ],
            "display_name" => "Sachbearbeiter",
            "members" => [
                [
                    "value" => "f66a81fb-2681-45ec-81b0-ce8346baac07",
                    "\$ref" => "/iam/v1/users/f66a81fb-2681-45ec-81b0-ce8346baac07"
                ]
            ],
            "urn:ietf:params:scim:schemas:extension:datev:2.0:group" => [
                "description" => "MitarbeiterInnen der Sachbearbeitung"
            ]
        ];

        $group = new Group($data);
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals("Sachbearbeiter", $group->getDisplayName());
        $this->assertEquals("MitarbeiterInnen der Sachbearbeitung", $group->getDatevExtension()->getDescription());
    }

    public function testGetGroups() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groups = $this->endpoint->search();
        $this->assertInstanceOf(Groups::class, $groups);
    }

    public function testGetGroup() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groupId = new GroupID("a077bae8-e669-4b3a-851b-35b2079d2acd");
        $group = $this->endpoint->get($groupId);
        $this->assertInstanceOf(Group::class, $group);
    }
}
