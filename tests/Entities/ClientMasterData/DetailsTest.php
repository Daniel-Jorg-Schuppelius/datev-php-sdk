<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Details\Details;
use Datev\Entities\ClientMasterData\Details\Detail;

class DetailsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["salutation" => "Herr", "note" => "VIP Kunde"],
                ["salutation" => "Frau", "note" => "Neukunde"]
            ]
        ];
        $collection = new Details($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Detail::class, $collection->getValues()[0]);
    }
}
