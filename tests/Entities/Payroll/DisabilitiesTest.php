<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Disabilities\Disabilities;
use Datev\Entities\Payroll\Disabilities\Disability;

class DisabilitiesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "valid_from" => "2024-01-01", "degree_of_disability" => 50.0, "issuing_authority" => "Versorgungsamt"],
                ["id" => "00002", "valid_from" => "2024-02-01", "degree_of_disability" => 30.0, "issuing_authority" => "Landesamt"]
            ]
        ];
        $collection = new Disabilities($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Disability::class, $collection->getValues()[0]);
    }
}
