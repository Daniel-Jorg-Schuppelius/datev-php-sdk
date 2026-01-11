<?php

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\Causes\Causes;
use Datev\Entities\Law\Causes\Cause;

class CausesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "cause-1", "name" => "Civil Case"],
                ["id" => "cause-2", "name" => "Criminal Case"]
            ]
        ];
        $collection = new Causes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Cause::class, $collection->getValues()[0]);
    }
}
