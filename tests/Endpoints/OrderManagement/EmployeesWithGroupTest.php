<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesWithGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\EmployeesWithGroupEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeesWithGroupTest extends EndpointTest {
    protected ?EmployeesWithGroupEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new EmployeesWithGroupEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetEmployeesWithGroup() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $employees = $this->endpoint->search();
        $this->assertNotNull($employees);
    }
}
