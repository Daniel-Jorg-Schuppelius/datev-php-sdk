<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\ClientGroupsEndpoint;
use Tests\Contracts\EndpointTest;

class ClientGroupsTest extends EndpointTest {
    protected ClientGroupsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new ClientGroupsEndpoint($this->client, self::getLogger());
    }

    public function test_get_client_groups(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $groups = $this->endpoint->search();
        $this->assertNotNull($groups);
    }
}
