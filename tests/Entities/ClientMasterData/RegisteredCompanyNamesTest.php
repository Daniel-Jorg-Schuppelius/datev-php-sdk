<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyNames;
use Datev\Entities\ClientMasterData\RegisteredCompanyNames\RegisteredCompanyName;

class RegisteredCompanyNamesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "rcn-1", "name" => "Registered Company ABC"],
                ["id" => "rcn-2", "name" => "Registered Company XYZ"]
            ]
        ];
        $collection = new RegisteredCompanyNames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(RegisteredCompanyName::class, $collection->getValues()[0]);
    }
}
