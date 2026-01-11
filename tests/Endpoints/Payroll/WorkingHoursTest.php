<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : WorkingHoursTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\WorkingHoursEndpoint;
use Datev\Entities\Payroll\WorkingHours\WorkingHours;
use Tests\Contracts\EndpointTest;

class WorkingHoursTest extends EndpointTest {
    protected ?WorkingHoursEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): WorkingHoursEndpoint {
        return new WorkingHoursEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'weekly_working_hours' => 40.0,
            'allocation_of_working_hours_monday' => 8.0,
            'allocation_of_working_hours_tuesday' => 8.0,
            'allocation_of_working_hours_wednesday' => 8.0,
            'allocation_of_working_hours_thursday' => 8.0,
            'allocation_of_working_hours_friday' => 8.0
        ];

        $workingHours = WorkingHours::fromJson(json_encode($data));
        $this->assertInstanceOf(WorkingHours::class, $workingHours);
    }

    public function testGetWorkingHours() {
        $this->endpoint = $this->createEndpoint();
        $workingHours = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($workingHours);
    }
}
