<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PartyRolesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\PartyRolesEndpoint;
use Tests\Contracts\EndpointTest;

class PartyRolesTest extends EndpointTest {
    protected PartyRolesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new PartyRolesEndpoint($this->client, self::getLogger());
    }

    public function test_get_party_roles(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $roles = $this->endpoint->search();
        $this->assertNotNull($roles);
    }
}
