<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCentersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\CostCentersEndpoint;
use Tests\Contracts\EndpointTest;

class CostCentersTest extends EndpointTest {
    protected ?CostCentersEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CostCentersEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetCostCenters() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $centers = $this->endpoint->search();
        $this->assertNotNull($centers);
    }
}
