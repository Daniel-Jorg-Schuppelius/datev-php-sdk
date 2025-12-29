<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DuesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\DuesEndpoint;
use Tests\Contracts\EndpointTest;

class DuesTest extends EndpointTest {
    protected ?DuesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DuesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetDues() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $dues = $this->endpoint->search();
        $this->assertNotNull($dues);
    }
}
