<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostSequencesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\CostSequencesEndpoint;
use Datev\Entities\Accounting\CostSequences\CostSequences;
use Tests\Contracts\EndpointTest;

class CostSequencesTest extends EndpointTest {
    protected ?CostSequencesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CostSequencesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetCostSequences() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));
        $this->endpoint->setCostSystemId(new ID('test-cost-system-id'));

        $costSequences = $this->endpoint->search();
        $this->assertInstanceOf(CostSequences::class, $costSequences);
    }
}
