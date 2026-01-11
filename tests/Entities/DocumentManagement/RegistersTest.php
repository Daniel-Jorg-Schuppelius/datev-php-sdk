<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\Registers\Registers;
use Datev\Entities\DocumentManagement\Registers\Register;

class RegistersTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "reg-1", "name" => "Inbox"],
                ["id" => "reg-2", "name" => "Outbox"]
            ]
        ];
        $collection = new Registers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Register::class, $collection->getValues()[0]);
    }
}
