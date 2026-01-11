<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Groups\Group;
use Datev\Entities\IdentityAndAccessManagement\Groups\Groups;

class GroupTest extends EntityTest {
    public function testCreateGroup() {
        $data = [
            "id" => "g1234567-8901-2345-6789-012345678901",
            "display_name" => "Administratoren",
            "schemas" => ["urn:ietf:params:scim:schemas:core:2.0:Group"]
        ];

        $group = new Group($data);
        $this->assertInstanceOf(Group::class, new Group());
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals("Administratoren", $group->getDisplayName());
    }

    public function testCreateGroups() {
        $data = [
            "content" => [
                [
                    "id" => "g1234567-8901-2345-6789-012345678901",
                    "display_name" => "Gruppe 1"
                ],
                [
                    "id" => "g2234567-8901-2345-6789-012345678902",
                    "display_name" => "Gruppe 2"
                ]
            ]
        ];

        $groups = new Groups($data);
        $this->assertInstanceOf(Groups::class, $groups);
        $this->assertCount(2, $groups->getValues());
    }
}
