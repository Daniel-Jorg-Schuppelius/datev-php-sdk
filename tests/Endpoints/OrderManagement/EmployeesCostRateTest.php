<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesCostRateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\EmployeesCostRateEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeesCostRateTest extends EndpointTest {
    protected EmployeesCostRateEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new EmployeesCostRateEndpoint($this->client, self::getLogger());
    }

    public function test_get_employees_cost_rate(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $rates = $this->endpoint->search();
        $this->assertNotNull($rates);
    }
}
