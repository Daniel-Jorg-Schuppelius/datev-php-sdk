<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\EmployeesEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeesTest extends EndpointTest {
    protected EmployeesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new EmployeesEndpoint($this->client, self::getLogger());
    }

    public function test_get_employees(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $employees = $this->endpoint->search();
        $this->assertNotNull($employees);
    }
}
