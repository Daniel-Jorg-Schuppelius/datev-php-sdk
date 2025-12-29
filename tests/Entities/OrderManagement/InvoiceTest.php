<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InvoiceTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\OrderManagement\Invoices\Invoice;
use Datev\Entities\OrderManagement\Invoices\Invoices;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateInvoice() {
        $data = [
            "id" => 12345,
            "invoice_id" => "inv-2024-001",
            "accounting_year" => 2024,
            "invoice_number" => 1001,
            "date_of_invoice" => "2024-01-15T00:00:00.000+00:00",
            "gross_amount" => 1190.00,
            "net_amount" => 1000.00,
            "vat_amount" => 190.00,
            "invoice_type" => "standard",
            "cancellation_flag" => false
        ];

        $invoice = new Invoice($data, $this->logger);
        $this->assertInstanceOf(Invoice::class, new Invoice());
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals(12345, $invoice->getID());
        $this->assertEquals(2024, $invoice->getAccountingYear());
        $this->assertEquals(1001, $invoice->getInvoiceNumber());
    }

    public function testCreateInvoices() {
        $data = [
            "content" => [
                [
                    "id" => 12345,
                    "invoice_number" => 1001
                ],
                [
                    "id" => 12346,
                    "invoice_number" => 1002
                ]
            ]
        ];

        $invoices = new Invoices($data, $this->logger);
        $this->assertInstanceOf(Invoices::class, $invoices);
        $this->assertCount(2, $invoices->getValues());
    }
}
