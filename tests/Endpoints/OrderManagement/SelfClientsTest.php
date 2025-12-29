<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SelfClientsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\SelfClientsEndpoint;
use Tests\Contracts\EndpointTest;

class SelfClientsTest extends EndpointTest {
    protected ?SelfClientsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new SelfClientsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetSelfClients() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $clients = $this->endpoint->search();
        $this->assertNotNull($clients);
    }
}
