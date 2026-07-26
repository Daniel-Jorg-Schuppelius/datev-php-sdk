<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubordersStateBillingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\SubordersStateBillingEndpoint;
use Tests\Contracts\EndpointTest;

class SubordersStateBillingTest extends EndpointTest {
    protected SubordersStateBillingEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new SubordersStateBillingEndpoint($this->client, self::getLogger());
    }

    public function test_get_suborders_state_billing(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $states = $this->endpoint->search();
        $this->assertNotNull($states);
    }
}
