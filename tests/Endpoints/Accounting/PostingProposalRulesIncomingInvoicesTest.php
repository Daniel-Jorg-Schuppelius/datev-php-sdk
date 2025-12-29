<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRulesIncomingInvoicesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\PostingProposalRulesIncomingInvoicesEndpoint;
use Tests\Contracts\EndpointTest;

class PostingProposalRulesIncomingInvoicesTest extends EndpointTest {
    protected ?PostingProposalRulesIncomingInvoicesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new PostingProposalRulesIncomingInvoicesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetPostingProposalRulesIncomingInvoices() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $rules = $this->endpoint->search();
        $this->assertNotNull($rules);
    }
}
