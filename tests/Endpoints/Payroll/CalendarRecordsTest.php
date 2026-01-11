<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CalendarRecordsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\CalendarRecordsEndpoint;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecord;
use Datev\Entities\Payroll\CalendarRecords\CalendarRecords;
use Tests\Contracts\EndpointTest;

class CalendarRecordsTest extends EndpointTest {
    protected ?CalendarRecordsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): CalendarRecordsEndpoint {
        return new CalendarRecordsEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'date' => '2025-01-15',
            'type' => 'Urlaub'
        ];

        $record = CalendarRecord::fromJson(json_encode($data));
        $this->assertInstanceOf(CalendarRecord::class, $record);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'date' => '2025-01-15'],
            ['id' => '12346', 'date' => '2025-01-16']
        ];

        $records = CalendarRecords::fromJson(json_encode($data));
        $this->assertInstanceOf(CalendarRecords::class, $records);
        $this->assertCount(2, $records->getValues());
    }

    public function testGetCalendarRecords() {
        $this->endpoint = $this->createEndpoint();
        $records = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($records);
    }
}
