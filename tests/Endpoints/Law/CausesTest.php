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
    protected ?CausesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CausesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetCauses() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $causes = $this->endpoint->search();
        $this->assertNotNull($causes);
    }
}
