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
    protected ?FeeVersionsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new FeeVersionsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_get_fee_versions() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $versions = $this->endpoint->search();
        $this->assertNotNull($versions);
    }
}
