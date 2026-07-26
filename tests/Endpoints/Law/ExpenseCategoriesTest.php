<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseCategoriesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\ExpenseCategoriesEndpoint;
use Tests\Contracts\EndpointTest;

class ExpenseCategoriesTest extends EndpointTest {
    protected ExpenseCategoriesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ExpenseCategoriesEndpoint($this->client, self::getLogger());
    }

    public function test_get_expense_categories(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $categories = $this->endpoint->search();
        $this->assertNotNull($categories);
    }
}
