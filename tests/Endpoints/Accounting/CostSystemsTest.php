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
    protected ?CostSystemsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): CostSystemsEndpoint {
        return new CostSystemsEndpoint($this->client, self::getLogger());
    }

    public function testGetCostSystems() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $costSystems = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($costSystems);
        } else {
            $this->assertInstanceOf(CostSystems::class, $costSystems);
        }
    }
}
