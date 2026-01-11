<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UserTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\Users\User;
use Datev\Entities\IdentityAndAccessManagement\Users\Users;

class UserTest extends EntityTest {
    public function testCreateUser() {
        $data = [
            "id" => "u1234567-8901-2345-6789-012345678901",
            "display_name" => "Max Mustermann",
            "active" => true,
            "schemas" => ["urn:ietf:params:scim:schemas:core:2.0:User"]
        ];

        $user = new User($data);
        $this->assertInstanceOf(User::class, new User());
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals("Max Mustermann", $user->getDisplayName());
        $this->assertTrue($user->isActive());
    }

    public function testCreateUsers() {
        $data = [
            "content" => [
                [
                    "id" => "u1234567-8901-2345-6789-012345678901",
                    "display_name" => "User 1"
                ],
                [
                    "id" => "u2234567-8901-2345-6789-012345678902",
                    "display_name" => "User 2"
                ]
            ]
        ];

        $users = new Users($data);
        $this->assertInstanceOf(Users::class, $users);
        $this->assertCount(2, $users->getValues());
    }
}
