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
    protected ?EmployeeCapacitiesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new EmployeeCapacitiesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetEmployeeCapacities() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $capacities = $this->endpoint->search();
        $this->assertNotNull($capacities);
    }
}
