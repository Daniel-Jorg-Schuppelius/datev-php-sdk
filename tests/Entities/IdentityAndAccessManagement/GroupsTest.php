<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GroupsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Groups\Groups;
use Datev\Entities\IdentityAndAccessManagement\Groups\Group;

class GroupsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "grp-1",
                    "display_name" => "Administrators"
                ],
                [
                    "id" => "grp-2",
                    "display_name" => "Users"
                ]
            ]
        ];

        $groups = new Groups($data);

        $this->assertCount(2, $groups->getValues());
        $this->assertInstanceOf(Group::class, $groups->getValues()[0]);
    }
}
