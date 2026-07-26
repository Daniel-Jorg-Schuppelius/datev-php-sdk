<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeesQualificationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\EmployeesQualificationEndpoint;
use Tests\Contracts\EndpointTest;

class EmployeesQualificationTest extends EndpointTest {
    protected EmployeesQualificationEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new EmployeesQualificationEndpoint($this->client, self::getLogger());
    }

    public function test_get_employees_qualification(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $qualifications = $this->endpoint->search();
        $this->assertNotNull($qualifications);
    }
}
