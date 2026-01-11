<?php

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Addresses\Addresses;
use Datev\Entities\Payroll\Addresses\Address;

class AddressesTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "00001", "street" => "Musterstraße", "house_number" => "123", "city" => "München", "postal_code" => "80331", "country" => "DE"],
                ["id" => "00002", "street" => "Testweg", "house_number" => "45", "city" => "Berlin", "postal_code" => "10115", "country" => "DE"]
            ]
        ];
        $collection = new Addresses($data);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(Address::class, $collection->getValues()[0]);
    }
}
