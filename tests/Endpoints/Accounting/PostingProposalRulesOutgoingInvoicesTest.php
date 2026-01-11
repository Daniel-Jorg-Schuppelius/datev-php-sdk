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
    protected ?PostingProposalRulesOutgoingInvoicesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): PostingProposalRulesOutgoingInvoicesEndpoint {
        return new PostingProposalRulesOutgoingInvoicesEndpoint($this->client, self::getLogger());
    }

    public function testGetPostingProposalRulesOutgoingInvoices() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $rules = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($rules);
        } else {
            $this->assertNotNull($rules);
        }
    }
}
