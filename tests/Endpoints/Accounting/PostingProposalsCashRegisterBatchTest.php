<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PostingProposalsCashRegisterBatchTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\PostingProposalsCashRegisterBatchEndpoint;
use Tests\Contracts\EndpointTest;

class PostingProposalsCashRegisterBatchTest extends EndpointTest {
    protected ?PostingProposalsCashRegisterBatchEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): PostingProposalsCashRegisterBatchEndpoint {
        return new PostingProposalsCashRegisterBatchEndpoint($this->client, self::getLogger());
    }

    public function testGetPostingProposalsCashRegisterBatch() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $proposals = $this->endpoint->search();

        $this->assertNotNull($proposals);
    }
}
