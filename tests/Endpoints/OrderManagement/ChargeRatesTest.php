<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ChargeRatesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\ChargeRatesEndpoint;
use Tests\Contracts\EndpointTest;

class ChargeRatesTest extends EndpointTest {
    protected ?ChargeRatesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ChargeRatesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_get_charge_rates() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $rates = $this->endpoint->search();
        $this->assertNotNull($rates);
    }
}
