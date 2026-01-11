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
    protected ?AccountingRecordsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new AccountingRecordsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetAccountingRecords() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));
        $this->endpoint->setSequenceId(new ID('test-sequence-id'));

        $records = $this->endpoint->search();
        $this->assertInstanceOf(RecordReads::class, $records);
    }
}
