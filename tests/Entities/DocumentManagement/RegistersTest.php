<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Registers\{Register, Registers};
use Tests\Contracts\EntityTest;

class RegistersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "reg-1", "name" => "Inbox"],
                ["id" => "reg-2", "name" => "Outbox"],
            ],
        ];
        $collection = new Registers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Register::class, $collection->getValues()[0]);
    }
}
