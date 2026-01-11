<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingRecordsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\AccountingRecordsEndpoint;
use Datev\Entities\Accounting\RecordReads\RecordReads;
use Tests\Contracts\EndpointTest;

class AccountingRecordsTest extends EndpointTest {
    protected ?AccountingRecordsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountingRecordsEndpoint {
        return new AccountingRecordsEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountingRecords() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));
        $this->endpoint->setSequenceId(new ID('test-sequence-id'));

        $records = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($records);
        } else {
            $this->assertInstanceOf(RecordReads::class, $records);
        }
    }
}
