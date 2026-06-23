<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Causes\{Cause, Causes};
use Tests\Contracts\EntityTest;

class CausesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cause-1", "name" => "Civil Case"],
                ["id" => "cause-2", "name" => "Criminal Case"],
            ],
        ];
        $collection = new Causes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Cause::class, $collection->getValues()[0]);
    }
}
