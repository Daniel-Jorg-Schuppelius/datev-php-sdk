<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Users\Users;
use Datev\Entities\DocumentManagement\Users\User;

class UsersTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "user-1", "name" => "Admin", "is_deleted" => false],
                ["id" => "user-2", "name" => "User", "is_deleted" => false]
            ]
        ];
        $collection = new Users($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(User::class, $collection->getValues()[0]);
    }
}
