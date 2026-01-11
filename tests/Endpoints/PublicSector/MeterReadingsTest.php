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
    protected ?MeterReadingsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new MeterReadingsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetMeterReadings() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $readings = $this->endpoint->search();
        $this->assertNotNull($readings);
    }
}
