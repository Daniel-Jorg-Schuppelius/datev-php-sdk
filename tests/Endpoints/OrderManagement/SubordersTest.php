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
    protected SubordersEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new SubordersEndpoint($this->client, self::getLogger());
    }

    public function test_get_suborders(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $suborders = $this->endpoint->get();
        $this->assertNotNull($suborders);
    }
}
