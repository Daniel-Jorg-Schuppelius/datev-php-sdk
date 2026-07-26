<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeeVersionsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\FeeVersionsEndpoint;
use Tests\Contracts\EndpointTest;

class FeeVersionsTest extends EndpointTest {
    protected FeeVersionsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new FeeVersionsEndpoint($this->client, self::getLogger());
    }

    public function test_get_fee_versions(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $versions = $this->endpoint->search();
        $this->assertNotNull($versions);
    }
}
