<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCentersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\CostCentersEndpoint;
use Datev\Entities\Accounting\CostCenters\CostCenters;
use Tests\Contracts\EndpointTest;

class CostCentersTest extends EndpointTest {
    protected ?CostCentersEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CostCentersEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetCostCenters() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));
        $this->endpoint->setCostSystemId(new ID('test-cost-system-id'));

        $costCenters = $this->endpoint->search();
        $this->assertInstanceOf(CostCenters::class, $costCenters);
    }
}
