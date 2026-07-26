<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CountryCodesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\ClientMasterData;

use Datev\API\Desktop\Endpoints\ClientMasterData\CountryCodesEndpoint;
use Tests\Contracts\EndpointTest;

class CountryCodesTest extends EndpointTest {
    protected CountryCodesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new CountryCodesEndpoint($this->client, self::getLogger());
    }

    public function test_get_country_codes(): void {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $codes = $this->endpoint->search();
        $this->assertNotNull($codes);
    }
}
