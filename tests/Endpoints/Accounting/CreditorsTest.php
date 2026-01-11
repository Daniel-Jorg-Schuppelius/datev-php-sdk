<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\CreditorsEndpoint;
use Datev\Entities\Accounting\Creditors\Creditors;
use Tests\Contracts\EndpointTest;

class CreditorsTest extends EndpointTest {
    protected ?CreditorsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): CreditorsEndpoint {
        return new CreditorsEndpoint($this->client, self::getLogger());
    }

    public function testGetCreditors() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $creditors = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($creditors);
        } else {
            $this->assertInstanceOf(Creditors::class, $creditors);
        }
    }
}
