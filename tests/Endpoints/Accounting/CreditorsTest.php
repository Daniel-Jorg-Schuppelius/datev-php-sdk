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
    protected ?CreditorsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new CreditorsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetCreditors() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $creditors = $this->endpoint->search();
        $this->assertInstanceOf(Creditors::class, $creditors);
    }
}
