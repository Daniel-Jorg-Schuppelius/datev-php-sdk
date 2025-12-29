<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubordersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\SubordersEndpoint;
use Tests\Contracts\EndpointTest;

class SubordersTest extends EndpointTest {
    protected ?SubordersEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new SubordersEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetSuborders() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $suborders = $this->endpoint->search();
        $this->assertNotNull($suborders);
    }
}
