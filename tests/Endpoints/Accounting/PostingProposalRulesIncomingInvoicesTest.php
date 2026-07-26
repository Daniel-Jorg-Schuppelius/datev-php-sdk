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
    protected ?PostingProposalRulesIncomingInvoicesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): PostingProposalRulesIncomingInvoicesEndpoint {
        return new PostingProposalRulesIncomingInvoicesEndpoint($this->client, self::getLogger());
    }

    public function test_get_posting_proposal_rules_incoming_invoices(): void {
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
