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
    protected ?PostingProposalRulesCashRegisterEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new PostingProposalRulesCashRegisterEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetPostingProposalRulesCashRegister() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $rules = $this->endpoint->search();
        $this->assertNotNull($rules);
    }
}
