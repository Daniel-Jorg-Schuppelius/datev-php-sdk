<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\FiscalYearsEndpoint;
use Datev\Entities\Accounting\FiscalYears\FiscalYears;
use Tests\Contracts\EndpointTest;

class FiscalYearsTest extends EndpointTest {
    protected ?FiscalYearsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new FiscalYearsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetFiscalYears() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));

        $fiscalYears = $this->endpoint->search();
        $this->assertInstanceOf(FiscalYears::class, $fiscalYears);
    }
}
