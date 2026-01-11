<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingSumsAndBalancesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\AccountingSumsAndBalancesEndpoint;
use Tests\Contracts\EndpointTest;

class AccountingSumsAndBalancesTest extends EndpointTest {
    protected ?AccountingSumsAndBalancesEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountingSumsAndBalancesEndpoint {
        return new AccountingSumsAndBalancesEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountingSumsAndBalances() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $sumsAndBalances = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($sumsAndBalances);
        } else {
            $this->assertNotNull($sumsAndBalances);
        }
    }
}
