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
    protected ?CountryCodesEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CountryCodesEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetCountryCodes() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $codes = $this->endpoint->search();
        $this->assertNotNull($codes);
    }
}
