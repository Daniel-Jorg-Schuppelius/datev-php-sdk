<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterReadingsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\MeterReadingsEndpoint;
use Tests\Contracts\EndpointTest;

class MeterReadingsTest extends EndpointTest {
    protected MeterReadingsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new MeterReadingsEndpoint($this->client, self::getLogger());
    }

    public function test_get_meter_readings(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $readings = $this->endpoint->search();
        $this->assertNotNull($readings);
    }
}
