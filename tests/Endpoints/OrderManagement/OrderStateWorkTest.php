<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrderStateWorkTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\OrderStateWorkEndpoint;
use Tests\Contracts\EndpointTest;

class OrderStateWorkTest extends EndpointTest {
    protected OrderStateWorkEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new OrderStateWorkEndpoint($this->client, self::getLogger());
    }

    public function test_get_order_state_work(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $states = $this->endpoint->search();
        $this->assertNotNull($states);
    }
}
