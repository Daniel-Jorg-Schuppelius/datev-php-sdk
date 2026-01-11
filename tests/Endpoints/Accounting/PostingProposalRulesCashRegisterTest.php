<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalRulesCashRegisterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\PostingProposalRulesCashRegisterEndpoint;
use Tests\Contracts\EndpointTest;

class PostingProposalRulesCashRegisterTest extends EndpointTest {
    protected ?PostingProposalRulesCashRegisterEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): PostingProposalRulesCashRegisterEndpoint {
        return new PostingProposalRulesCashRegisterEndpoint($this->client, self::getLogger());
    }

    public function testGetPostingProposalRulesCashRegister() {
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
