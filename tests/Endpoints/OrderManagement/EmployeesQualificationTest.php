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
    protected ?EmployeesQualificationEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new EmployeesQualificationEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_get_employees_qualification() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $qualifications = $this->endpoint->search();
        $this->assertNotNull($qualifications);
    }
}
