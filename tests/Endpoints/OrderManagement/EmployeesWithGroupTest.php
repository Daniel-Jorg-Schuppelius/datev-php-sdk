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
    protected EmployeesWithGroupEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new EmployeesWithGroupEndpoint($this->client, self::getLogger());
    }

    public function test_get_employees_with_group(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $employees = $this->endpoint->search();
        $this->assertNotNull($employees);
    }
}
