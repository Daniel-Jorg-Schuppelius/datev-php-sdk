<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\TaxOffices\TaxOffices;
use Datev\Entities\ClientMasterData\TaxOffices\TaxOffice;

class TaxOfficesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "to-1", "tax_office_name" => "Finanzamt München", "tax_office_number" => "9101"],
                ["id" => "to-2", "tax_office_name" => "Finanzamt Berlin", "tax_office_number" => "1101"]
            ]
        ];
        $collection = new TaxOffices($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(TaxOffice::class, $collection->getValues()[0]);
    }
}
