<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxAuthoritiesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\TaxAuthoritiesEndpoint;
use Tests\Contracts\EndpointTest;

class TaxAuthoritiesTest extends EndpointTest {
    protected TaxAuthoritiesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new TaxAuthoritiesEndpoint($this->client, self::getLogger());
    }

    public function test_get_tax_authorities(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $authorities = $this->endpoint->search();
        $this->assertNotNull($authorities);
    }
}
