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
    protected ?AccountingSequencesProcessedEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new AccountingSequencesProcessedEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetAccountingSequencesProcessed() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $sequences = $this->endpoint->search();
        $this->assertNotNull($sequences);
    }
}
