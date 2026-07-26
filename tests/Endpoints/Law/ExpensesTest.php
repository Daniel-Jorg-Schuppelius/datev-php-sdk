<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpensesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\ExpensesEndpoint;
use Tests\Contracts\EndpointTest;

class ExpensesTest extends EndpointTest {
    protected ExpensesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ExpensesEndpoint($this->client, self::getLogger());
    }

    public function test_get_expenses(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $expenses = $this->endpoint->search();
        $this->assertNotNull($expenses);
    }
}
