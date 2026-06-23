<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CountryCodes\{CountryCode, CountryCodes};
use Tests\Contracts\EntityTest;

class CountryCodesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "DE", "name" => "Germany"],
                ["id" => "AT", "name" => "Austria"],
            ],
        ];
        $collection = new CountryCodes($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CountryCode::class, $collection->getValues()[0]);
    }
}
