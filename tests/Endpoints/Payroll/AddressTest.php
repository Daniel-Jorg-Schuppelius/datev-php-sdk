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
use Datev\Entities\Payroll\Addresses\{Address, Addresses};
use Tests\Contracts\EndpointTest;

class AddressTest extends EndpointTest {
    protected ?AddressEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): AddressEndpoint {
        return new AddressEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'street' => 'Musterstraße',
            'house_number' => '123',
            'zip_code' => '12345',
            'city' => 'Musterstadt',
            'country' => 'DE',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $address = Address::fromJson($json);
        $this->assertInstanceOf(Address::class, $address);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['street' => 'Musterstraße', 'city' => 'Musterstadt'],
            ['street' => 'Beispielweg', 'city' => 'Beispielstadt'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $addresses = Addresses::fromJson($json);
        $this->assertInstanceOf(Addresses::class, $addresses);
        $this->assertCount(2, $addresses->getValues());
    }

    public function test_get_addresses(): void {
        $this->endpoint = $this->createEndpoint();
        $addresses = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($addresses);
    }
}
