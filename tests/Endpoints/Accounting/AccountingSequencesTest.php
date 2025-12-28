<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSequencesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\AccountingSequencesEndpoint;
use Datev\Entities\Accounting\Sequences\Sequence;
use Tests\Contracts\EndpointTest;

class AccountingSequencesTest extends EndpointTest {
    protected ?AccountingSequencesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new AccountingSequencesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetAccountingSequences() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $sequence = $this->endpoint->get(new ID('test-sequence-id'));
        $this->assertInstanceOf(Sequence::class, $sequence);
    }
}
