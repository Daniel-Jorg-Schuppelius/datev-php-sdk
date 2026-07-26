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
    protected DuesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new DuesEndpoint($this->client, self::getLogger());
    }

    public function test_get_dues(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $dues = $this->endpoint->search();
        $this->assertNotNull($dues);
    }
}
