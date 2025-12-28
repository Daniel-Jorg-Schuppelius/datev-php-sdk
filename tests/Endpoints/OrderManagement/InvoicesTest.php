<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InvoicesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\OrderManagement;

use Datev\API\Desktop\Endpoints\OrderManagement\InvoicesEndpoint;
use Datev\Entities\OrderManagement\Invoices\Invoice;
use Datev\Entities\OrderManagement\Invoices\Invoices;
use Tests\Contracts\EndpointTest;

class InvoicesTest extends EndpointTest {
    protected ?InvoicesEndpoint $endpoint;

    public function __construct($name = null) {
        parent::__construct($name);
        $this->endpoint = new InvoicesEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testJsonSerialize() {
        $data = [
            'id' => 10000,
            'invoice_id' => 100001,
            'accounting_year' => 2024,
            'invoice_number' => 10010,
            'date_of_invoice' => '2024-02-01',
            'gross_amount' => 1190.00,
            'net_amount' => 1000.00,
            'vat_amount' => 190.00,
            'client_id' => 'd7e3c10f-8b5a-42d4-b790-e84c1762b8b9',
            'invoice_type' => 'REC',
            'cancellation_flag' => false
        ];

        $invoice = Invoice::fromJson(json_encode($data));

        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals(10000, $invoice->getID());
        $this->assertEquals(2024, $invoice->getAccountingYear());
        $this->assertEquals(10010, $invoice->getInvoiceNumber());
        $this->assertEquals(1190.00, $invoice->getGrossAmount());
        $this->assertEquals(1000.00, $invoice->getNetAmount());
        $this->assertFalse($invoice->isCancellation());
    }

    public function testJsonSerializeCollection() {
        $data = [
            [
                'id' => 10000,
                'invoice_id' => 100001,
                'accounting_year' => 2024,
                'invoice_number' => 10010
            ],
            [
                'id' => 10001,
                'invoice_id' => 100002,
                'accounting_year' => 2024,
                'invoice_number' => 10011
            ]
        ];

        $invoices = Invoices::fromJson(json_encode($data));

        $this->assertInstanceOf(Invoices::class, $invoices);
        $this->assertCount(2, $invoices->getValues());
    }

    public function testSearchInvoices() {
        if ($this->apiDisabled) {
            $this->markTestSkipped('API is disabled');
        }

        $result = $this->endpoint->search();

        $this->assertInstanceOf(Invoices::class, $result);
    }
}
