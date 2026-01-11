<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\DebitorsEndpoint;
use Datev\Entities\Accounting\Debitors\Debitors;
use Tests\Contracts\EndpointTest;

class DebitorsTest extends EndpointTest {
    protected ?DebitorsEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): DebitorsEndpoint {
        return new DebitorsEndpoint($this->client, self::getLogger());
    }

    public function testGetDebitors() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $debitors = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($debitors);
        } else {
            $this->assertInstanceOf(Debitors::class, $debitors);
        }
    }
}
