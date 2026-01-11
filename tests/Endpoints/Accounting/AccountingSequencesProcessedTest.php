<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSequencesProcessedTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\AccountingSequencesProcessedEndpoint;
use Tests\Contracts\EndpointTest;

class AccountingSequencesProcessedTest extends EndpointTest {
    protected ?AccountingSequencesProcessedEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountingSequencesProcessedEndpoint {
        return new AccountingSequencesProcessedEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountingSequencesProcessed() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $sequences = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($sequences);
        } else {
            $this->assertNotNull($sequences);
        }
    }
}
