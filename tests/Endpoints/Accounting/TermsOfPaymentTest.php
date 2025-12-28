<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TermsOfPaymentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Tests\Endpoints\Accounting;

use APIToolkit\Entities\ID;
use Datev\API\Desktop\Endpoints\Accounting\TermsOfPaymentEndpoint;
use Datev\Entities\Accounting\TermsOfPayment\TermsOfPayment;
use Tests\Contracts\EndpointTest;

class TermsOfPaymentTest extends EndpointTest {
    protected ?TermsOfPaymentEndpoint $endpoint;

    public function __construct($name) {
        parent::__construct($name);
        $this->endpoint = new TermsOfPaymentEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testGetTermsOfPayment() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $terms = $this->endpoint->search();
        $this->assertInstanceOf(TermsOfPayment::class, $terms);
    }
}
