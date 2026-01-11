<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingTransactionKeysTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\AccountingTransactionKeysEndpoint;
use Tests\Contracts\EndpointTest;

class AccountingTransactionKeysTest extends EndpointTest {
    protected ?AccountingTransactionKeysEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountingTransactionKeysEndpoint {
        return new AccountingTransactionKeysEndpoint($this->client, self::getLogger());
    }

    public function testGetTransactionKeys() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $keys = $this->endpoint->search();

        $this->assertNotNull($keys);
    }
}
