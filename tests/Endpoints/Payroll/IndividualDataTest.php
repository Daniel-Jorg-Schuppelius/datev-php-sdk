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
use Datev\Entities\Payroll\Data\Individual\{IndividualData, IndividualDatum};
use Tests\Contracts\EndpointTest;

class IndividualDataTest extends EndpointTest {
    protected ?IndividualDataEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): IndividualDataEndpoint {
        return new IndividualDataEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'field_name' => 'custom_field',
            'field_value' => 'custom_value',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $individualData = IndividualDatum::fromJson($json);
        $this->assertInstanceOf(IndividualDatum::class, $individualData);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'field_name' => 'field1'],
            ['id' => '12346', 'field_name' => 'field2'],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);
        $collection = IndividualData::fromJson($json);
        $this->assertInstanceOf(IndividualData::class, $collection);
        $this->assertCount(2, $collection->getValues());
    }

    public function test_get_individual_data(): void {
        $this->endpoint = $this->createEndpoint();
        $data = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($data);
    }
}
