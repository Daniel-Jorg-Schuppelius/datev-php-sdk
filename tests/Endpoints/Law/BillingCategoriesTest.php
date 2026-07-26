<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BillingCategoriesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\BillingCategoriesEndpoint;
use Tests\Contracts\EndpointTest;

class BillingCategoriesTest extends EndpointTest {
    protected BillingCategoriesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new BillingCategoriesEndpoint($this->client, self::getLogger());
    }

    public function test_get_billing_categories(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $categories = $this->endpoint->search();
        $this->assertNotNull($categories);
    }
}
