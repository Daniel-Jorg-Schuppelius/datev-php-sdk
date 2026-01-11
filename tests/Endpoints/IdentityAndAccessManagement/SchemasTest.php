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
    protected ?SchemasEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new SchemasEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetSchemas() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $schemas = $this->endpoint->search();
        $this->assertNotNull($schemas);
    }
}
