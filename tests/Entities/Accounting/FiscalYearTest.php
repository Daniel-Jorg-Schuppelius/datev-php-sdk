<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Accounting\FiscalYears\FiscalYear;
use Datev\Entities\Accounting\FiscalYears\FiscalYears;
use PHPUnit\Framework\TestCase;

class FiscalYearTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFiscalYear() {
        $data = [
            "id" => "2024",
            "account_length" => 4,
            "account_system" => 3,
            "advance_turnover_tax_return" => "monthly",
            "begin" => "2024-01-01T00:00:00.000+00:00",
            "client_number" => 10000,
            "consultant_number" => 1001,
            "cost_length" => 5,
            "creditor_term_of_payment_id" => 1,
            "currency_code" => "EUR",
            "debitor_term_of_payment_id" => 2,
            "end" => "2024-12-31T00:00:00.000+00:00",
            "is_invoice_date_check_on" => true,
            "is_locked" => false,
            "is_using_delivery_date" => true,
            "is_using_receivable_type" => false,
            "legal_form" => "GmbH",
            "method_of_determining_net_income" => "profit_comparison",
            "national_right" => "DE",
            "taxation_method" => "standard"
        ];

        $fiscalYear = new FiscalYear($data, $this->logger);
        $this->assertInstanceOf(FiscalYear::class, new FiscalYear());
        $this->assertInstanceOf(FiscalYear::class, $fiscalYear);
        $this->assertEquals("2024", $fiscalYear->getID());
        $this->assertEquals(4, $fiscalYear->getAccountLength());
        $this->assertEquals(10000, $fiscalYear->getClientNumber());
        $this->assertEquals("EUR", $fiscalYear->getCurrencyCode());
        $this->assertFalse($fiscalYear->isLocked());
    }

    public function testCreateFiscalYears() {
        $data = [
            "content" => [
                [
                    "id" => "2024",
                    "client_number" => 10000,
                    "begin" => "2024-01-01T00:00:00.000+00:00",
                    "end" => "2024-12-31T00:00:00.000+00:00"
                ],
                [
                    "id" => "2023",
                    "client_number" => 10000,
                    "begin" => "2023-01-01T00:00:00.000+00:00",
                    "end" => "2023-12-31T00:00:00.000+00:00"
                ]
            ]
        ];

        $fiscalYears = new FiscalYears($data, $this->logger);
        $this->assertInstanceOf(FiscalYears::class, $fiscalYears);
        $this->assertCount(2, $fiscalYears->getValues());
    }
}
