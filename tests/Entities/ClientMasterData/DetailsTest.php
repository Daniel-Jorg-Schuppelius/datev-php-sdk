<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Details\{Detail, Details};
use Tests\Contracts\EntityTest;

class DetailsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["salutation" => "Herr", "note" => "VIP Kunde"],
                ["salutation" => "Frau", "note" => "Neukunde"],
            ],
        ];
        $collection = new Details($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Detail::class, $collection->getValues()[0]);
    }
}
