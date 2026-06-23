<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\NextFreeNumbers\{NextFreeNumber, NextFreeNumbers};
use Tests\Contracts\EntityTest;

class NextFreeNumbersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "nfn-1", "type" => "CLIENT", "number" => 10001],
                ["id" => "nfn-2", "type" => "ADDRESSEE", "number" => 20001],
            ],
        ];
        $collection = new NextFreeNumbers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(NextFreeNumber::class, $collection->getValues()[0]);
    }
}
