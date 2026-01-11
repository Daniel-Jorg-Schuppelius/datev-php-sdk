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
    protected ?FeePlansEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new FeePlansEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetFeePlans() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $plans = $this->endpoint->search();
        $this->assertNotNull($plans);
    }
}
