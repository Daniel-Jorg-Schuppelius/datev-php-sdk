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
    protected ?BillingCategoriesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new BillingCategoriesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetBillingCategories() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $categories = $this->endpoint->search();
        $this->assertNotNull($categories);
    }
}
