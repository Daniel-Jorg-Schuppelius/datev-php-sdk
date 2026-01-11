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
    protected ?FeesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new FeesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetFees() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $fees = $this->endpoint->search();
        $this->assertNotNull($fees);
    }
}
