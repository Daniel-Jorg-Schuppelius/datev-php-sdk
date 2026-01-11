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
    protected ?LevelsOfJurisdictionEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new LevelsOfJurisdictionEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetLevelsOfJurisdiction() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $levels = $this->endpoint->search();
        $this->assertNotNull($levels);
    }
}
