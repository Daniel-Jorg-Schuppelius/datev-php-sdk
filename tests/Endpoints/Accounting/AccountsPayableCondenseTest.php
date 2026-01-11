<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountsPayableCondenseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\AccountsPayableCondenseEndpoint;
use Tests\Contracts\EndpointTest;

class AccountsPayableCondenseTest extends EndpointTest {
    protected ?AccountsPayableCondenseEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountsPayableCondenseEndpoint {
        return new AccountsPayableCondenseEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountsPayableCondense() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $accounts = $this->endpoint->search();

        $this->assertNotNull($accounts);
    }
}
