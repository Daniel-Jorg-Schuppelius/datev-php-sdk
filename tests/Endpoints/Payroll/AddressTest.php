<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\AddressEndpoint;
use Datev\Entities\Payroll\Addresses\Address;
use Datev\Entities\Payroll\Addresses\Addresses;
use Tests\Contracts\EndpointTest;

class AddressTest extends EndpointTest {
    protected ?AddressEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): AddressEndpoint {
        return new AddressEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'street' => 'Musterstraße',
            'house_number' => '123',
            'zip_code' => '12345',
            'city' => 'Musterstadt',
            'country' => 'DE'
        ];

        $address = Address::fromJson(json_encode($data));
        $this->assertInstanceOf(Address::class, $address);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['street' => 'Musterstraße', 'city' => 'Musterstadt'],
            ['street' => 'Beispielweg', 'city' => 'Beispielstadt']
        ];

        $addresses = Addresses::fromJson(json_encode($data));
        $this->assertInstanceOf(Addresses::class, $addresses);
        $this->assertCount(2, $addresses->getValues());
    }

    public function testGetAddresses() {
        $this->endpoint = $this->createEndpoint();
        $addresses = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($addresses);
    }
}
