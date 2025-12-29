<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ConsumptionsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\ConsumptionsEndpoint;
use Tests\Contracts\EndpointTest;

class ConsumptionsTest extends EndpointTest {
    protected ?ConsumptionsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new ConsumptionsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetConsumptions() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $consumptions = $this->endpoint->search();
        $this->assertNotNull($consumptions);
    }
}
