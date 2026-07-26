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
use Datev\Entities\Payroll\GrossPayments\{GrossPayment, GrossPayments};
use Tests\Contracts\EndpointTest;

class GrossPaymentsTest extends EndpointTest {
    protected ?GrossPaymentsEndpoint $endpoint = null;
    protected string $mockDomain = 'payroll';

    protected function createEndpoint(): GrossPaymentsEndpoint {
        return new GrossPaymentsEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => '12345',
            'amount' => 5000.00,
            'currency' => 'EUR',
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $payment = GrossPayment::fromJson($json);
        $this->assertInstanceOf(GrossPayment::class, $payment);
    }

    public function test_json_serialize_collection(): void {
        $data = [
            ['id' => '12345', 'amount' => 5000.00],
            ['id' => '12346', 'amount' => 4500.00],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $payments = GrossPayments::fromJson($json);
        $this->assertInstanceOf(GrossPayments::class, $payments);
        $this->assertCount(2, $payments->getValues());
    }

    public function test_get_gross_payments(): void {
        $this->endpoint = $this->createEndpoint();
        $payments = $this->endpoint->search(["reference-date" => "2021-01-01"]);

        $this->assertNotNull($payments);
    }
}
