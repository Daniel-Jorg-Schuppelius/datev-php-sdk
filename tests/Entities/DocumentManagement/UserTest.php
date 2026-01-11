<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UserTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Users\User;
use Datev\Entities\DocumentManagement\Users\Users;
use Datev\Entities\DocumentManagement\Users\UserID;

class UserTest extends EntityTest {
    public function testCreateUser(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Max Mustermann",
            "is_deleted" => false,
            "is_user_group" => false
        ];

        $user = new User($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertInstanceOf(UserID::class, $user->getID());
        $this->assertEquals("550e8400-e29b-41d4-a716-446655440000", $user->getID()->getValue());
        $this->assertEquals("Max Mustermann", $user->getName());
        $this->assertFalse($user->isDeleted());
        $this->assertFalse($user->isUserGroup());
    }

    public function testCreateUsers(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "name" => "Max Mustermann",
                    "is_deleted" => false,
                    "is_user_group" => false
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "name" => "Buchhaltung",
                    "is_deleted" => false,
                    "is_user_group" => true
                ]
            ]
        ];

        $users = new Users($data);

        $this->assertInstanceOf(Users::class, $users);
        $this->assertCount(2, $users);
        $this->assertInstanceOf(User::class, $users->getValues()[0]);
    }
}
