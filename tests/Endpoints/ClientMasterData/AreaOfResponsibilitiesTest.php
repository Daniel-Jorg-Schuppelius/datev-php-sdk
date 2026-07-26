<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AreaOfResponsibilitiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\AreaOfResponsibilitiesEndpoint;
use Datev\Entities\ClientMasterData\AreaOfResponsibilities\{AreaOfResponsibilities, AreaOfResponsibility};
use Tests\Contracts\EndpointTest;

class AreaOfResponsibilitiesTest extends EndpointTest {
    protected AreaOfResponsibilitiesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new AreaOfResponsibilitiesEndpoint($this->client, self::getLogger());
    }

    public function test_get_addressees(): void {
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
