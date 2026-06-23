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
    protected ?AccountingAreasEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new AccountingAreasEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function test_get_accounting_areas() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $areas = $this->endpoint->search();
        $this->assertNotNull($areas);
    }
}
