<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingStatisticsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\AccountingStatisticsEndpoint;
use Tests\Contracts\EndpointTest;

class AccountingStatisticsTest extends EndpointTest {
    protected ?AccountingStatisticsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): AccountingStatisticsEndpoint {
        return new AccountingStatisticsEndpoint($this->client, self::getLogger());
    }

    public function testGetAccountingStatistics() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $statistics = $this->endpoint->search();

        $this->assertNotNull($statistics);
    }
}
