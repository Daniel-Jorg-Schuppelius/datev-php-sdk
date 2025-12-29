<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SuborderStateBillingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\SuborderStateBilling\SuborderStateBilling;
use Datev\Entities\OrderManagement\SuborderStateBilling\SubordersStateBilling;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class SuborderStateBillingTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateSuborderStateBilling(): void {
        $data = [
            "id" => "test-id",
            "order_id" => 2024001,
            "suborder_id" => 1,
            "creation_year" => 2024,
            "order_number" => 1,
            "suborder_number" => 100,
            "accounting_year" => 2024,
            "invoice_number" => 50001,
            "invoice_calculation_date" => "2024-03-01",
            "invoice_billing_date" => "2024-03-15"
        ];

        $suborderStateBilling = new SuborderStateBilling($data, $this->logger);

        $this->assertInstanceOf(SuborderStateBilling::class, $suborderStateBilling);
        $this->assertEquals(2024001, $suborderStateBilling->getOrderId());
        $this->assertEquals(1, $suborderStateBilling->getSuborderId());
        $this->assertEquals(50001, $suborderStateBilling->getInvoiceNumber());
    }

    public function testCreateSubordersStateBilling(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "order_id" => 2024001,
                    "invoice_number" => 50001
                ],
                [
                    "id" => "test-id-2",
                    "order_id" => 2024002,
                    "invoice_number" => 50002
                ]
            ]
        ];

        $subordersStateBilling = new SubordersStateBilling($data, $this->logger);

        $this->assertInstanceOf(SubordersStateBilling::class, $subordersStateBilling);
        $this->assertCount(2, $subordersStateBilling);
    }
}
