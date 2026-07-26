<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpensePostingsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\ExpensePostingsEndpoint;
use Tests\Contracts\EndpointTest;

class ExpensePostingsTest extends EndpointTest {
    protected ExpensePostingsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ExpensePostingsEndpoint($this->client, self::getLogger());
    }

    public function test_get_expense_postings(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $postings = $this->endpoint->search();
        $this->assertNotNull($postings);
    }
}
