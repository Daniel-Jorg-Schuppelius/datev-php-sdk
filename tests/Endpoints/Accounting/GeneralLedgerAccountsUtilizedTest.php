<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GeneralLedgerAccountsUtilizedTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Accounting;

use Datev\API\Desktop\Endpoints\Accounting\GeneralLedgerAccountsUtilizedEndpoint;
use Tests\Contracts\EndpointTest;

class GeneralLedgerAccountsUtilizedTest extends EndpointTest {
    protected ?GeneralLedgerAccountsUtilizedEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): GeneralLedgerAccountsUtilizedEndpoint {
        return new GeneralLedgerAccountsUtilizedEndpoint($this->client, self::getLogger());
    }

    public function testGetGeneralLedgerAccountsUtilized() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $accounts = $this->endpoint->search();

        $this->assertNotNull($accounts);
    }
}
