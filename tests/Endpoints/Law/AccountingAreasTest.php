<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingAreasTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Law;

use Datev\API\Desktop\Endpoints\Law\AccountingAreasEndpoint;
use Tests\Contracts\EndpointTest;

class AccountingAreasTest extends EndpointTest {
    protected AccountingAreasEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new AccountingAreasEndpoint($this->client, self::getLogger());
    }

    public function test_get_accounting_areas(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $areas = $this->endpoint->search();
        $this->assertNotNull($areas);
    }
}
