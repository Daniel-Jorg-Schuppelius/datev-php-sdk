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
    protected ChargeRatesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ChargeRatesEndpoint($this->client, self::getLogger());
    }

    public function test_get_charge_rates(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $rates = $this->endpoint->search();
        $this->assertNotNull($rates);
    }
}
