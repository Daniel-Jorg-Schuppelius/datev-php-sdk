<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\RegisteredCompanyNames\{RegisteredCompanyName, RegisteredCompanyNames};
use Tests\Contracts\EntityTest;

class RegisteredCompanyNamesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "rcn-1", "name" => "Registered Company ABC"],
                ["id" => "rcn-2", "name" => "Registered Company XYZ"],
            ],
        ];
        $collection = new RegisteredCompanyNames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RegisteredCompanyName::class, $collection->getValues()[0]);
    }
}
