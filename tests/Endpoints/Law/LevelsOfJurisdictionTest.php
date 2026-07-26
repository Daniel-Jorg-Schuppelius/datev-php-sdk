<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LevelsOfJurisdictionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\LevelsOfJurisdictionEndpoint;
use Tests\Contracts\EndpointTest;

class LevelsOfJurisdictionTest extends EndpointTest {
    protected LevelsOfJurisdictionEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new LevelsOfJurisdictionEndpoint($this->client, self::getLogger());
    }

    public function test_get_levels_of_jurisdiction(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $levels = $this->endpoint->search();
        $this->assertNotNull($levels);
    }
}
