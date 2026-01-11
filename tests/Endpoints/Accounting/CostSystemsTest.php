<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostSystemsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\CostSystemsEndpoint;
use Datev\Entities\Accounting\CostSystems\CostSystems;
use Tests\Contracts\EndpointTest;

class CostSystemsTest extends EndpointTest {
    protected ?CostSystemsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CostSystemsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetCostSystems() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $costSystems = $this->endpoint->search();
        $this->assertInstanceOf(CostSystems::class, $costSystems);
    }
}
