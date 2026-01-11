<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InitialActivitiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\InitialActivitiesEndpoint;
use Datev\Entities\Common\Employees\EmployeeID;
use Datev\Entities\Payroll\InitialActivities\InitialActivity;
use Datev\Entities\Payroll\InitialActivities\InitialActivities;
use Tests\Contracts\EndpointTest;

class InitialActivitiesTest extends EndpointTest {
    protected ?InitialActivitiesEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): InitialActivitiesEndpoint {
        return new InitialActivitiesEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'activity_type' => 'Erstanstellung',
            'start_date' => '2024-01-01'
        ];

        $activity = InitialActivity::fromJson(json_encode($data));
        $this->assertInstanceOf(InitialActivity::class, $activity);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'activity_type' => 'Erstanstellung'],
            ['id' => '12346', 'activity_type' => 'Wiedereinstellung']
        ];

        $activities = InitialActivities::fromJson(json_encode($data));
        $this->assertInstanceOf(InitialActivities::class, $activities);
        $this->assertCount(2, $activities->getValues());
    }

    public function testGetInitialActivities() {
        // Dieser Endpoint benötigt eine gültige Employee-ID, die nur mit echter API funktioniert
        if ($this->isUsingMock()) {
            $this->markTestSkipped('InitialActivities endpoint requires valid Employee ID from real API');
        }

        $this->endpoint = $this->createEndpoint();
        $this->endpoint->setEmployeeID(new EmployeeID(1));
        $activities = $this->endpoint->search(["reference-date" => "2021-01-01"]);
        $this->assertNotNull($activities);
    }
}
