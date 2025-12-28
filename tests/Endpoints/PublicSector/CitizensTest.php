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
use Datev\Entities\PublicSector\Citizens\Citizen;
use Datev\Entities\PublicSector\Citizens\Citizens;
use Tests\Contracts\EndpointTest;

class CitizensTest extends EndpointTest {
    protected ?CitizensEndpoint $endpoint;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->endpoint = new CitizensEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testJsonSerialize() {
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
                'city' => 'Musterstadt'
            ]
        ];

        $citizen = Citizen::fromJson(json_encode($data));
        $this->assertInstanceOf(Citizen::class, $citizen);
        $this->assertEquals('Max', $citizen->getFirstName());
        $this->assertEquals('Mustermann', $citizen->getLastName());
        $this->assertEquals('max.mustermann@example.com', $citizen->getEmail());
        $this->assertNotNull($citizen->getLocation());
        $this->assertEquals('Musterstraße', $citizen->getLocation()->getStreet());
    }

    public function testJsonSerializeCollection() {
        $data = [
            [
                'id' => '550e8400-e29b-41d4-a716-446655440000',
                'first_name' => 'Max',
                'last_name' => 'Mustermann'
            ],
            [
                'id' => '660e8400-e29b-41d4-a716-446655440001',
                'first_name' => 'Erika',
                'last_name' => 'Musterfrau'
            ]
        ];

        $citizens = Citizens::fromJson(json_encode($data));
        $this->assertInstanceOf(Citizens::class, $citizens);
        $this->assertCount(2, $citizens->getValues());
    }
}
