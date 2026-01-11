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
    protected ?MonthlyValuesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new MonthlyValuesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetMonthlyValues() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $values = $this->endpoint->search();
        $this->assertNotNull($values);
    }
}
