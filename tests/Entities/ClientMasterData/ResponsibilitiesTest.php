<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Responsibilities\Responsibilities;
use Datev\Entities\ClientMasterData\Responsibilities\Responsibility;

class ResponsibilitiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "resp-1", "area_of_responsibility_name" => "Steuerberater", "employee_display_name" => "Max Mustermann"],
                ["id" => "resp-2", "area_of_responsibility_name" => "Buchhalter", "employee_display_name" => "Anna Schmidt"]
            ]
        ];
        $collection = new Responsibilities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Responsibility::class, $collection->getValues()[0]);
    }
}
