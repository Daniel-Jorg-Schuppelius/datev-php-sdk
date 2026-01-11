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
    protected ?TermsOfPaymentEndpoint $endpoint = null;
    protected string $mockDomain = 'accounting';

    protected function createEndpoint(): TermsOfPaymentEndpoint {
        return new TermsOfPaymentEndpoint($this->client, self::getLogger());
    }

    public function testGetTermsOfPayment() {
        $this->skipMockIfComplexEntity();

        $this->endpoint = $this->createEndpoint();

        $this->endpoint->setClientId(new ID('test-client-id'));
        $this->endpoint->setFiscalYearId(new ID('test-fiscal-year-id'));

        $terms = $this->endpoint->search();

        if ($this->isUsingMock()) {
            $this->assertNotNull($terms);
        } else {
            $this->assertInstanceOf(TermsOfPayment::class, $terms);
        }
    }
}
