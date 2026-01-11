<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthRecordsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\MonthRecordsEndpoint;
use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecord;
use Datev\Entities\Payroll\MonthlyRecords\MonthlyRecords;
use Tests\Contracts\EndpointTest;

class MonthRecordsTest extends EndpointTest {
    protected ?MonthRecordsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): MonthRecordsEndpoint {
        return new MonthRecordsEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'month' => 1,
            'year' => 2025
        ];

        $record = MonthlyRecord::fromJson(json_encode($data));
        $this->assertInstanceOf(MonthlyRecord::class, $record);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'month' => 1],
            ['id' => '12346', 'month' => 2]
        ];

        $records = MonthlyRecords::fromJson(json_encode($data));
        $this->assertInstanceOf(MonthlyRecords::class, $records);
        $this->assertCount(2, $records->getValues());
    }

    public function testGetMonthRecords() {
        $this->endpoint = $this->createEndpoint();
        $records = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($records);
    }
}
