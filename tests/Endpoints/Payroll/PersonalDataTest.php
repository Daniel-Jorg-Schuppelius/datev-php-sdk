<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PersonalDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\PersonalDataEndpoint;
use Datev\Entities\Payroll\Data\Personal\PersonalDatum;
use Datev\Entities\Payroll\Data\Personal\PersonalData;
use Tests\Contracts\EndpointTest;

class PersonalDataTest extends EndpointTest {
    protected ?PersonalDataEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): PersonalDataEndpoint {
        return new PersonalDataEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
            'date_of_birth' => '1990-05-15'
        ];

        $personalData = PersonalDatum::fromJson(json_encode($data));
        $this->assertInstanceOf(PersonalDatum::class, $personalData);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'first_name' => 'Max'],
            ['id' => '12346', 'first_name' => 'Erika']
        ];

        $collection = PersonalData::fromJson(json_encode($data));
        $this->assertInstanceOf(PersonalData::class, $collection);
        $this->assertCount(2, $collection->getValues());
    }

    public function testGetPersonalData() {
        $this->endpoint = $this->createEndpoint();
        $data = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($data);
    }
}
