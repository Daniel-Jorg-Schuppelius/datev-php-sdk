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
    protected ?ResourceTypesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ResourceTypesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetResourceTypes() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $resourceTypes = $this->endpoint->search();
        $this->assertNotNull($resourceTypes);
    }
}
