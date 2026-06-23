<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\Disabilities\{Disabilities, Disability};
use Tests\Contracts\EntityTest;

class DisabilitiesTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                ["id" => "00001", "valid_from" => "2024-01-01", "degree_of_disability" => 50.0, "issuing_authority" => "Versorgungsamt"],
                ["id" => "00002", "valid_from" => "2024-02-01", "degree_of_disability" => 30.0, "issuing_authority" => "Landesamt"],
            ],
        ];
        $collection = new Disabilities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Disability::class, $collection->getValues()[0]);
    }
}
