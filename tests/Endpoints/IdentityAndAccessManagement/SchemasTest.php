<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SchemasTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\IdentityAndAccessManagement;

use Datev\API\Desktop\Endpoints\IdentityAndAccessManagement\SchemasEndpoint;
use Tests\Contracts\EndpointTest;

class SchemasTest extends EndpointTest {
    protected SchemasEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new SchemasEndpoint($this->client, self::getLogger());
    }

    public function test_get_schemas(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $schemas = $this->endpoint->get();
        $this->assertNotNull($schemas);
    }
}
