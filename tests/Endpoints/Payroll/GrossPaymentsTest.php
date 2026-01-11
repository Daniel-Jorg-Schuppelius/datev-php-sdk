<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPaymentsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Payroll;

use Datev\API\Desktop\Endpoints\Payroll\GrossPaymentsEndpoint;
use Datev\Entities\Payroll\GrossPayments\GrossPayment;
use Datev\Entities\Payroll\GrossPayments\GrossPayments;
use Tests\Contracts\EndpointTest;

class GrossPaymentsTest extends EndpointTest {
    protected ?GrossPaymentsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): GrossPaymentsEndpoint {
        return new GrossPaymentsEndpoint($this->client, self::getLogger());
    }

    public function testJsonSerialize() {
        $data = [
            'id' => '12345',
            'amount' => 5000.00,
            'currency' => 'EUR'
        ];

        $payment = GrossPayment::fromJson(json_encode($data));
        $this->assertInstanceOf(GrossPayment::class, $payment);
    }

    public function testJsonSerializeCollection() {
        $data = [
            ['id' => '12345', 'amount' => 5000.00],
            ['id' => '12346', 'amount' => 4500.00]
        ];

        $payments = GrossPayments::fromJson(json_encode($data));
        $this->assertInstanceOf(GrossPayments::class, $payments);
        $this->assertCount(2, $payments->getValues());
    }

    public function testGetGrossPayments() {
        $this->endpoint = $this->createEndpoint();
        $payments = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($payments);
    }
}
