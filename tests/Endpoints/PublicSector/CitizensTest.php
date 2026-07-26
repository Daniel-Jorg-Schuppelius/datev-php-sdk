<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CitizensTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\CitizensEndpoint;
use Datev\Entities\PublicSector\Citizens\{Citizen, Citizens};
use Tests\Contracts\EndpointTest;

class CitizensTest extends EndpointTest {
    protected CitizensEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new CitizensEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
            'email' => 'max.mustermann@example.com',
            'mobile_phone' => '+49 123 456789',
            'date_of_birth' => '1985-05-15',
            'location' => [
                'street' => 'Musterstraße',
                'house_number' => '123',
                'zip_code' => '12345',
                'city' => 'Musterstadt',
            ],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $citizen = Citizen::fromJson($json);
        $this->assertInstanceOf(Citizen::class, $citizen);
        $this->assertEquals('Max', $citizen->getFirstName());
        $this->assertEquals('Mustermann', $citizen->getLastName());
        $this->assertEquals('max.mustermann@example.com', $citizen->getEmail());
        $this->assertNotNull($citizen->getLocation());
        $this->assertEquals('Musterstraße', $citizen->getLocation()->getStreet());
    }

    public function test_json_serialize_collection(): void {
        $data = [
            [
                'id' => '550e8400-e29b-41d4-a716-446655440000',
                'first_name' => 'Max',
                'last_name' => 'Mustermann',
            ],
            [
                'id' => '660e8400-e29b-41d4-a716-446655440001',
                'first_name' => 'Erika',
                'last_name' => 'Musterfrau',
            ],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $citizens = Citizens::fromJson($json);
        $this->assertInstanceOf(Citizens::class, $citizens);
        $this->assertCount(2, $citizens->getValues());
    }
}
