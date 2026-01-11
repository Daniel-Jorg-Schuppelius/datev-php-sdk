<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CustomFieldsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\CustomFieldsEndpoint;
use Tests\Contracts\EndpointTest;

class CustomFieldsTest extends EndpointTest {
    protected ?CustomFieldsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CustomFieldsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetCustomFields() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $fields = $this->endpoint->search();
        $this->assertNotNull($fields);
    }
}
