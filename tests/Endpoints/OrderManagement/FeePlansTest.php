<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeePlansTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\FeePlansEndpoint;
use Tests\Contracts\EndpointTest;

class FeePlansTest extends EndpointTest {
    protected FeePlansEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new FeePlansEndpoint($this->client, self::getLogger());
    }

    public function test_get_fee_plans(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $plans = $this->endpoint->search();
        $this->assertNotNull($plans);
    }
}
