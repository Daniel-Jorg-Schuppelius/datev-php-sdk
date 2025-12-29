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
    protected ?ExpensesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ExpensesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetExpenses() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $expenses = $this->endpoint->search();
        $this->assertNotNull($expenses);
    }
}
