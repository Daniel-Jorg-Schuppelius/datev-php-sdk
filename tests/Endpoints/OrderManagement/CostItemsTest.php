<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostItemsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\CostItemsEndpoint;
use Tests\Contracts\EndpointTest;

class CostItemsTest extends EndpointTest {
    protected CostItemsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new CostItemsEndpoint($this->client, self::getLogger());
    }

    public function test_get_cost_items(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $items = $this->endpoint->getByOrderId(1);
        $this->assertNotNull($items);
    }
}
