<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ActivityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\ActivityEndpoint;
use Datev\Entities\Payroll\Activities\{Activities, Activity};
use Tests\Contracts\EndpointTest;

class ActivityTest extends EndpointTest {
    protected ?ActivityEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): ActivityEndpoint {
        return new ActivityEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize() {
        $data = [
            'id' => '12345',
            'activity_type' => 'Vollzeit',
            'employee_type' => 'Angestellter',
            'job_title' => 'Softwareentwickler',
            'weekly_working_hours' => 40.0,
        ];

        $activity = Activity::fromJson(json_encode($data));
        $this->assertInstanceOf(Activity::class, $activity);
    }

    public function test_json_serialize_collection() {
        $data = [
            ['id' => '12345', 'activity_type' => 'Vollzeit'],
            ['id' => '12346', 'activity_type' => 'Teilzeit'],
        ];

        $activities = Activities::fromJson(json_encode($data));
        $this->assertInstanceOf(Activities::class, $activities);
        $this->assertCount(2, $activities->getValues());
    }

    public function test_get_activities() {
        $this->endpoint = $this->createEndpoint();
        $activities = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($activities);
    }
}
