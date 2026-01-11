<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRulesOutgoingInvoicesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\PostingProposalRulesOutgoingInvoicesEndpoint;
use Tests\Contracts\EndpointTest;

class PostingProposalRulesOutgoingInvoicesTest extends EndpointTest {
    protected ?PostingProposalRulesOutgoingInvoicesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new PostingProposalRulesOutgoingInvoicesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetPostingProposalRulesOutgoingInvoices() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $rules = $this->endpoint->search();
        $this->assertNotNull($rules);
    }
}
