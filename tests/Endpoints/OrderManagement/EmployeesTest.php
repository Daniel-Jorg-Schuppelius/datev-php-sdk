<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\EmployeesEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeesTest extends EndpointTest {
    protected ?EmployeesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new EmployeesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetEmployees() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $employees = $this->endpoint->search();
        $this->assertNotNull($employees);
    }
}
