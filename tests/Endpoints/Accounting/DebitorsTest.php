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
    protected ?DebitorsEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new DebitorsEndpoint($this->client, self::getLogger());
        $this->apiDisabled = true;
    }

    public function testGetDebitors() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $debitors = $this->endpoint->search();
        $this->assertInstanceOf(Debitors::class, $debitors);
    }
}
