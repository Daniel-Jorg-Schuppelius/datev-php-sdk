<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\ClientsEndpoint;
use Tests\Contracts\EndpointTest;

class ClientsTest extends EndpointTest {
    protected ?ClientsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ClientsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetClients() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $clients = $this->endpoint->search();
        $this->assertNotNull($clients);
    }
}
