<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\RegistrationNumbers\RegistrationNumbers;
use Datev\Entities\ClientMasterData\RegistrationNumbers\RegistrationNumber;

class RegistrationNumbersTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rn-1", "number" => "HRB 12345", "court" => "Munich"],
                ["id" => "rn-2", "number" => "HRB 67890", "court" => "Berlin"]
            ]
        ];
        $collection = new RegistrationNumbers($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RegistrationNumber::class, $collection->getValues()[0]);
    }
}
