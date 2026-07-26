<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\FeesEndpoint;
use Tests\Contracts\EndpointTest;

class FeesTest extends EndpointTest {
    protected FeesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new FeesEndpoint($this->client, self::getLogger());
    }

    public function test_get_fees(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $fees = $this->endpoint->search();
        $this->assertNotNull($fees);
    }
}
