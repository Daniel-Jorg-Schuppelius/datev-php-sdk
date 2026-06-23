<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RegistrationNumbers\{RegistrationNumber, RegistrationNumbers};
use Tests\Contracts\EntityTest;

class RegistrationNumbersTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "rn-1", "number" => "HRB 12345", "court" => "Munich"],
                ["id" => "rn-2", "number" => "HRB 67890", "court" => "Berlin"],
            ],
        ];
        $collection = new RegistrationNumbers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RegistrationNumber::class, $collection->getValues()[0]);
    }
}
