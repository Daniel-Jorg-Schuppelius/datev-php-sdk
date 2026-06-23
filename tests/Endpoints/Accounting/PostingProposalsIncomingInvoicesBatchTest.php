<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalsIncomingInvoicesBatchTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\PostingProposalsIncomingInvoicesBatchEndpoint;
use Tests\Contracts\EndpointTest;

class PostingProposalsIncomingInvoicesBatchTest extends EndpointTest {
    protected ?PostingProposalsIncomingInvoicesBatchEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): PostingProposalsIncomingInvoicesBatchEndpoint {
        return new PostingProposalsIncomingInvoicesBatchEndpoint($this->client, self::getLogger());
    }

    public function test_get_posting_proposals_incoming_invoices_batch() {
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
