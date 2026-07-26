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
use Datev\Entities\IdentityAndAccessManagement\Groups\{Group, GroupID, Groups};
use Tests\Contracts\EndpointTest;

class GroupsTest extends EndpointTest {
    protected GroupsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new GroupsEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            "id" => "a077bae8-e669-4b3a-851b-35b2079d2acd",
            "meta" => [
                "resource_type" => "group",
                "location" => "/iam/v1/groups/a077bae8-e669-4b3a-851b-35b2079d2acd",
            ],
            "schemas" => [
                "urn:ietf:params:scim:schemas:core:2.0:Group",
                "urn:ietf:params:scim:schemas:extension:datev:2.0:group",
            ],
            "display_name" => "Sachbearbeiter",
            "members" => [
                [
                    "value" => "f66a81fb-2681-45ec-81b0-ce8346baac07",
                    "\$ref" => "/iam/v1/users/f66a81fb-2681-45ec-81b0-ce8346baac07",
                ],
            ],
            "urn:ietf:params:scim:schemas:extension:datev:2.0:group" => [
                "description" => "MitarbeiterInnen der Sachbearbeitung",
            ],
        ];

        $group = new Group($data);
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals("Sachbearbeiter", $group->getDisplayName());
        $datevExtension = $group->getDatevExtension();
        $this->assertNotNull($datevExtension);
        $this->assertEquals("MitarbeiterInnen der Sachbearbeitung", $datevExtension->getDescription());
    }

    public function test_get_groups(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groups = $this->endpoint->search();
        $this->assertInstanceOf(Groups::class, $groups);
    }

    public function test_get_group(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groupId = new GroupID("a077bae8-e669-4b3a-851b-35b2079d2acd");
        $group = $this->endpoint->get($groupId);
        $this->assertInstanceOf(Group::class, $group);
    }
}
