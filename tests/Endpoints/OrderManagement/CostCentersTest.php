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
    protected CostCentersEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new CostCentersEndpoint($this->client, self::getLogger());
    }

    public function test_get_cost_centers(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $centers = $this->endpoint->search();
        $this->assertNotNull($centers);
    }
}
