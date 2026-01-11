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
    protected ?FiscalYearsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): FiscalYearsEndpoint {
        return new FiscalYearsEndpoint($this->client, self::getLogger());
    }

    public function testGetFiscalYears() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));

        $fiscalYears = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($fiscalYears);
        } else {
            $this->assertInstanceOf(FiscalYears::class, $fiscalYears);
        }
    }
}
