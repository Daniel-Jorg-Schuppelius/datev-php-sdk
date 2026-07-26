<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeCapacitiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\EmployeeCapacitiesEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeeCapacitiesTest extends EndpointTest {
    protected EmployeeCapacitiesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new EmployeeCapacitiesEndpoint($this->client, self::getLogger());
    }

    public function test_get_employee_capacities(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $capacities = $this->endpoint->search();
        $this->assertNotNull($capacities);
    }
}
