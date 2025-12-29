<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InvoicesTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\Invoices\Invoices;
use Datev\Entities\OrderManagement\Invoices\Invoice;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class InvoicesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "invoice_number" => 20240001,
                    "gross_amount" => 1500.00
                ],
                [
                    "id" => 2,
                    "invoice_number" => 20240002,
                    "gross_amount" => 2500.00
                ]
            ]
        ];

        $invoices = new Invoices($data, $this->logger);

        $this->assertCount(2, $invoices->getValues());
        $this->assertInstanceOf(Invoice::class, $invoices->getValues()[0]);
    }
}
