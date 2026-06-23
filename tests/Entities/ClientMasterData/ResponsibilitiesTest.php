<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\Responsibilities\{Responsibilities, Responsibility};
use Tests\Contracts\EntityTest;

class ResponsibilitiesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "resp-1", "area_of_responsibility_name" => "Steuerberater", "employee_display_name" => "Max Mustermann"],
                ["id" => "resp-2", "area_of_responsibility_name" => "Buchhalter", "employee_display_name" => "Anna Schmidt"],
            ],
        ];
        $collection = new Responsibilities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Responsibility::class, $collection->getValues()[0]);
    }
}
