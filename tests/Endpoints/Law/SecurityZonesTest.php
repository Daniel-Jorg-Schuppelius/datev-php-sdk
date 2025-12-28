<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SecurityZonesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\SecurityZonesEndpoint;
use Tests\Contracts\EndpointTest;

class SecurityZonesTest extends EndpointTest {
    protected ?SecurityZonesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new SecurityZonesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetSecurityZones() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $zones = $this->endpoint->search();
        $this->assertNotNull($zones);
    }
}
