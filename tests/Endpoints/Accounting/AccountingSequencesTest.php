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
    protected ?AccountingSequencesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountingSequencesEndpoint {
        return new AccountingSequencesEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountingSequences() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $sequence = $this->endpoint->get(new ID('test-sequence-id'));

        if ($this->isUsingMock()) {
            $this->assertNotNull($sequence);
        } else {
            $this->assertInstanceOf(Sequence::class, $sequence);
        }
    }
}
