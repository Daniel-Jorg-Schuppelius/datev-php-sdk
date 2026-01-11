<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostAccountingRecordsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\CostAccountingRecordsEndpoint;
use Tests\Contracts\EndpointTest;

class CostAccountingRecordsTest extends EndpointTest {
    protected ?CostAccountingRecordsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): CostAccountingRecordsEndpoint {
        return new CostAccountingRecordsEndpoint($this->client, self::getLogger());
    }

    public function testGetCostAccountingRecords() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));
        $this->endpoint->setCostSystemId(new ID('test-cost-system-id'));
        $this->endpoint->setCostSequenceId(new ID('test-cost-sequence-id'));

        $records = $this->endpoint->search();

        $this->assertNotNull($records);
    }
}
