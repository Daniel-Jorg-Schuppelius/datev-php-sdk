<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountsReceivableCondenseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\AccountsReceivableCondenseEndpoint;
use Tests\Contracts\EndpointTest;

class AccountsReceivableCondenseTest extends EndpointTest {
    protected ?AccountsReceivableCondenseEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountsReceivableCondenseEndpoint {
        return new AccountsReceivableCondenseEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountsReceivableCondense() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $accounts = $this->endpoint->search();

        $this->assertNotNull($accounts);
    }
}
