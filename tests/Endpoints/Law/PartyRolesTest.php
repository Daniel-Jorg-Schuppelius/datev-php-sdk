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
    protected ?PartyRolesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new PartyRolesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetPartyRoles() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $roles = $this->endpoint->search();
        $this->assertNotNull($roles);
    }
}
