<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalsOutgoingInvoicesBatchTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\PostingProposalsOutgoingInvoicesBatchEndpoint;
use Tests\Contracts\EndpointTest;

class PostingProposalsOutgoingInvoicesBatchTest extends EndpointTest {
    protected ?PostingProposalsOutgoingInvoicesBatchEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): PostingProposalsOutgoingInvoicesBatchEndpoint {
        return new PostingProposalsOutgoingInvoicesBatchEndpoint($this->client, self::getLogger());
    }

    public function testGetPostingProposalsOutgoingInvoicesBatch() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $proposals = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($proposals);
        } else {
            $this->assertNotNull($proposals);
        }
    }
}
