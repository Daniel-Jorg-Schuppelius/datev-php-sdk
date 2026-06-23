<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Users\{User, Users};
use Tests\Contracts\EntityTest;

class UsersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "user-1", "name" => "Admin", "is_deleted" => false],
                ["id" => "user-2", "name" => "User", "is_deleted" => false],
            ],
        ];
        $collection = new Users($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(User::class, $collection->getValues()[0]);
    }
}
