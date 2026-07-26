<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\FeesEndpoint;
use Datev\Entities\PublicSector\Fees\{Fee, Fees};
use Tests\Contracts\EndpointTest;

class FeesTest extends EndpointTest {
    protected FeesEndpoint $endpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new FeesEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize(): void {
        $data = [
            'id' => 12345,
            'fee_name' => 'Wassergebühr',
            'date_from' => '2024-01-01',
            'date_to' => '2024-12-31',
            'fee_type' => 'monthly',
            'invoice_recipient' => 'Max Mustermann',
            'payment_method' => [
                'bank_name' => 'Musterbank',
                'account_holder' => 'Max Mustermann',
                'iban' => 'DE89370400440532013000',
            ],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $fee = Fee::fromJson($json);
        $this->assertInstanceOf(Fee::class, $fee);
        $this->assertEquals(12345, $fee->getID());
        $this->assertEquals('Wassergebühr', $fee->getFeeName());
        $this->assertEquals('Max Mustermann', $fee->getInvoiceRecipient());
        $this->assertNotNull($fee->getPaymentMethod());
        $this->assertEquals('Musterbank', $fee->getPaymentMethod()->getBankName());
    }

    public function test_json_serialize_collection(): void {
        $data = [
            [
                'id' => 12345,
                'fee_name' => 'Wassergebühr',
                'invoice_recipient' => 'Max Mustermann',
            ],
            [
                'id' => 12346,
                'fee_name' => 'Müllgebühr',
                'invoice_recipient' => 'Erika Musterfrau',
            ],
        ];

        $json = json_encode($data);
        $this->assertNotFalse($json);

        $fees = Fees::fromJson($json);
        $this->assertInstanceOf(Fees::class, $fees);
        $this->assertCount(2, $fees->getValues());
    }
}
