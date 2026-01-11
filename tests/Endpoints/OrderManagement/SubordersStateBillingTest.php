<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubordersStateBillingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\SubordersStateBillingEndpoint;
use Tests\Contracts\EndpointTest;

class SubordersStateBillingTest extends EndpointTest {
    protected ?SubordersStateBillingEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new SubordersStateBillingEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetSubordersStateBilling() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $states = $this->endpoint->search();
        $this->assertNotNull($states);
    }
}
