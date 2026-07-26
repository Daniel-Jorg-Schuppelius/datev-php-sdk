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
    protected ClientGroupEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ClientGroupEndpoint($this->client, self::getLogger());
    }

    public function test_get_client_group(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groups = $this->endpoint->get();
        $this->assertNotNull($groups);
    }
}
