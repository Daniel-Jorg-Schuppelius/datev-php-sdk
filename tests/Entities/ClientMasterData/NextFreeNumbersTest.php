<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumbers;
use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumber;

class NextFreeNumbersTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "nfn-1", "type" => "CLIENT", "number" => 10001],
                ["id" => "nfn-2", "type" => "ADDRESSEE", "number" => 20001]
            ]
        ];
        $collection = new NextFreeNumbers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(NextFreeNumber::class, $collection->getValues()[0]);
    }
}
