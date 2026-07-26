<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CausesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\CausesEndpoint;
use Tests\Contracts\EndpointTest;

class CausesTest extends EndpointTest {
    protected CausesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new CausesEndpoint($this->client, self::getLogger());
    }

    public function test_get_causes(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $causes = $this->endpoint->search();
        $this->assertNotNull($causes);
    }
}
