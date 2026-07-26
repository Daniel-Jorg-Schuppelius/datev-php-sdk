<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceTypesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\IdentityAndAccessManagement;

use Datev\API\Desktop\Endpoints\IdentityAndAccessManagement\ResourceTypesEndpoint;
use Tests\Contracts\EndpointTest;

class ResourceTypesTest extends EndpointTest {
    protected ResourceTypesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ResourceTypesEndpoint($this->client, self::getLogger());
    }

    public function test_get_resource_types(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $resourceTypes = $this->endpoint->get();
        $this->assertNotNull($resourceTypes);
    }
}
