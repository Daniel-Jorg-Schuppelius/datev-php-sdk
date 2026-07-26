<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionMeterReadingsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\TransactionMeterReadingsEndpoint;
use Tests\Contracts\EndpointTest;

class TransactionMeterReadingsTest extends EndpointTest {
    protected TransactionMeterReadingsEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new TransactionMeterReadingsEndpoint($this->client, self::getLogger());
    }

    public function test_get_transaction_meter_readings(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $readings = $this->endpoint->search();
        $this->assertNotNull($readings);
    }
}
