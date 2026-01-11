<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountsReceivableTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\AccountsReceivableEndpoint;
use Tests\Contracts\EndpointTest;

class AccountsReceivableTest extends EndpointTest {
    protected ?AccountsReceivableEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountsReceivableEndpoint {
        return new AccountsReceivableEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountsReceivable() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $accounts = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($accounts);
        } else {
            $this->assertNotNull($accounts);
        }
    }
}
