<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\CountryCodes\CountryCodes;
use Datev\Entities\ClientMasterData\CountryCodes\CountryCode;

class CountryCodesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "DE", "name" => "Germany"],
                ["id" => "AT", "name" => "Austria"]
            ]
        ];
        $collection = new CountryCodes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CountryCode::class, $collection->getValues()[0]);
    }
}
