<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccountsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\GeneralLedgerAccountsEndpoint;
use Datev\Entities\Accounting\GeneralLedgerAccounts\GeneralLedgerAccounts;
use Tests\Contracts\EndpointTest;

class GeneralLedgerAccountsTest extends EndpointTest {
    protected ?GeneralLedgerAccountsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new GeneralLedgerAccountsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetGeneralLedgerAccounts() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $accounts = $this->endpoint->search();
        $this->assertInstanceOf(GeneralLedgerAccounts::class, $accounts);
    }
}
