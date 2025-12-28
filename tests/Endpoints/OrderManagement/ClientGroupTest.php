<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\ClientGroupEndpoint;
use Tests\Contracts\EndpointTest;

class ClientGroupTest extends EndpointTest {
    protected ?ClientGroupEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ClientGroupEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetClientGroup() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groups = $this->endpoint->search();
        $this->assertNotNull($groups);
    }
}
