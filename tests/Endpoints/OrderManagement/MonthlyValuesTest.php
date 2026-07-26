<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MonthlyValuesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\MonthlyValuesEndpoint;
use Tests\Contracts\EndpointTest;

class MonthlyValuesTest extends EndpointTest {
    protected MonthlyValuesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new MonthlyValuesEndpoint($this->client, self::getLogger());
    }

    public function test_get_monthly_values(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $values = $this->endpoint->search();
        $this->assertNotNull($values);
    }
}
