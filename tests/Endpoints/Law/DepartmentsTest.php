<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DepartmentsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\DepartmentsEndpoint;
use Tests\Contracts\EndpointTest;

class DepartmentsTest extends EndpointTest {
    protected ?DepartmentsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DepartmentsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetDepartments() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $departments = $this->endpoint->search();
        $this->assertNotNull($departments);
    }
}
