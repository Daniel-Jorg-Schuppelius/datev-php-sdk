<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : UsersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\Users\{User, Users};
use Tests\Contracts\EntityTest;

class UsersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "usr-1",
                    "display_name" => "Administrator",
                    "active" => true,
                ],
                [
                    "id" => "usr-2",
                    "display_name" => "User 1",
                    "active" => true,
                ],
            ],
        ];

        $users = new Users($data);

        $this->assertCount(2, $users->getValues());
        $this->assertInstanceOf(User::class, $users->getValues()[0]);
    }
}
