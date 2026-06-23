<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CompanyNames\{CompanyName, CompanyNames};
use Tests\Contracts\EntityTest;

class CompanyNamesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "cn-1", "name" => "Company ABC GmbH"],
                ["id" => "cn-2", "name" => "Company XYZ AG"],
            ],
        ];
        $collection = new CompanyNames($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CompanyName::class, $collection->getValues()[0]);
    }
}
