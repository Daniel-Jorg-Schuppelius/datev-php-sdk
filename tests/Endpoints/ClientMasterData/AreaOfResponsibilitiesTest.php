<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AreaOfResponsibilitiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Diagnostics;

use Datev\API\Desktop\Endpoints\ClientMasterData\AreaOfResponsibilitiesEndpoint;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibilities;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\AreaOfResponsibility;
use Tests\Contracts\EndpointTest;

class AreaOfResponsibilitiesTest extends EndpointTest {
    protected ?AreaOfResponsibilitiesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new AreaOfResponsibilitiesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true; // API is disabled
    }

    public function testGetAddressees() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $areaOfResponsibilities = $this->endpoint->search();
        $this->assertInstanceOf(AreaOfResponsibilities::class, $areaOfResponsibilities);
        $this->assertNotEmpty($areaOfResponsibilities->getValues(), "No areaOfResponsibilities found");
        $randomAreaOfResponsibility = $areaOfResponsibilities->getValues()[array_rand($areaOfResponsibilities->getValues())];
        $this->assertInstanceOf(AreaOfResponsibility::class, $randomAreaOfResponsibility);
        $areaOfResponsibility = $this->endpoint->get($randomAreaOfResponsibility->getID());
        $this->assertInstanceOf(AreaOfResponsibility::class, $areaOfResponsibility);
        $this->assertEquals($randomAreaOfResponsibility->getID(), $areaOfResponsibility->getID());
    }
}
