<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HourlyWagesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\HourlyWagesEndpoint;
use Datev\Entities\Payroll\HourlyWages\{HourlyWage, HourlyWages};
use Tests\Contracts\EndpointTest;

class HourlyWagesTest extends EndpointTest {
    protected ?HourlyWagesEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): HourlyWagesEndpoint {
        return new HourlyWagesEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'hourly_rate' => 25.50,
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $wage = HourlyWage::fromJson($json);
        $this->assertInstanceOf(HourlyWage::class, $wage);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'hourly_rate' => 25.50],
            ['id' => '12346', 'hourly_rate' => 30.00],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $wages = HourlyWages::fromJson($json);
        $this->assertInstanceOf(HourlyWages::class, $wages);
        $this->assertCount(2, $wages->getValues());
    }

    public function test_get_hourly_wages(): void {
        $this->endpoint = $this->createEndpoint();
        $wages = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($wages);
    }
}
