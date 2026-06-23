<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmploymentPeriodsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\EmploymentPeriodsEndpoint;
use Datev\Entities\Payroll\EmploymentPeriods\{EmploymentPeriod, EmploymentPeriods};
use Tests\Contracts\EndpointTest;

class EmploymentPeriodsTest extends EndpointTest {
    protected ?EmploymentPeriodsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): EmploymentPeriodsEndpoint {
        return new EmploymentPeriodsEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize() {
        $data = [
            'id' => '12345',
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
        ];

        $period = EmploymentPeriod::fromJson(json_encode($data));
        $this->assertInstanceOf(EmploymentPeriod::class, $period);
    }

    public function test_json_serialize_collection() {
        $data = [
            ['id' => '12345', 'start_date' => '2024-01-01'],
            ['id' => '12346', 'start_date' => '2023-01-01'],
        ];

        $periods = EmploymentPeriods::fromJson(json_encode($data));
        $this->assertInstanceOf(EmploymentPeriods::class, $periods);
        $this->assertCount(2, $periods->getValues());
    }

    public function test_get_employment_periods() {
        $this->endpoint = $this->createEndpoint();
        $periods = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($periods);
    }
}
