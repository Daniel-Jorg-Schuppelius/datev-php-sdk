<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Taxations\Taxations;
use Datev\Entities\Payroll\Taxations\Taxation;

class TaxationsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "tax_identification_number" => "00123456873", "employment_type" => "hauptarbeitgeber", "is_two_percent_flat_rate_taxation" => false],
                ["id" => "00002", "tax_identification_number" => "00987654321", "employment_type" => "nebenarbeitgeber", "is_two_percent_flat_rate_taxation" => true]
            ]
        ];
        $collection = new Taxations($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Taxation::class, $collection->getValues()[0]);
    }
}
