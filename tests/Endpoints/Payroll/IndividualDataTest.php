<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\IndividualDataEndpoint;
use Datev\Entities\Payroll\Data\Individual\IndividualDatum;
use Datev\Entities\Payroll\Data\Individual\IndividualData;
use Tests\Contracts\EndpointTest;

class IndividualDataTest extends EndpointTest {
    protected ?IndividualDataEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): IndividualDataEndpoint {
        return new IndividualDataEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'field_name' => 'custom_field',
            'field_value' => 'custom_value'
        ];

        $individualData = IndividualDatum::fromJson(json_encode($data));
        $this->assertInstanceOf(IndividualDatum::class, $individualData);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'field_name' => 'field1'],
            ['id' => '12346', 'field_name' => 'field2']
        ];

        $collection = IndividualData::fromJson(json_encode($data));
        $this->assertInstanceOf(IndividualData::class, $collection);
        $this->assertCount(2, $collection->getValues());
    }

    public function testGetIndividualData() {
        $this->endpoint = $this->createEndpoint();
        $data = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($data);
    }
}
