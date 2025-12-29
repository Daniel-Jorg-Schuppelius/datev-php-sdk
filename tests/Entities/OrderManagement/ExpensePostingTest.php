<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpensePostingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\OrderManagement;

use Datev\Entities\OrderManagement\ExpensePostings\ExpensePosting;
use Datev\Entities\OrderManagement\ExpensePostings\ExpensePostings;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ExpensePostingTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateExpensePosting(): void {
        $data = [
            "id" => "EP-001",
            "order_id" => "550e8400-e29b-41d4-a716-446655440000",
            "suborder_id" => "660e8400-e29b-41d4-a716-446655440001",
            "employee_id" => "770e8400-e29b-41d4-a716-446655440002",
            "work_date" => "2024-01-15",
            "entry_date" => "2024-01-16",
            "cost_position" => "1000",
            "fee_position" => "2000",
            "comment" => "Testbuchung",
            "isbillable" => true,
            "time_units" => 4,
            "cost_amount" => 500.00
        ];

        $expensePosting = new ExpensePosting($data, $this->logger);

        $this->assertInstanceOf(ExpensePosting::class, $expensePosting);
        $this->assertEquals("EP-001", $expensePosting->getID());
        $this->assertEquals("Testbuchung", $expensePosting->getComment());
    }

    public function testCreateExpensePostings(): void {
        $data = [
            "content" => [
                [
                    "id" => "EP-001",
                    "comment" => "Buchung 1"
                ],
                [
                    "id" => "EP-002",
                    "comment" => "Buchung 2"
                ]
            ]
        ];

        $expensePostings = new ExpensePostings($data, $this->logger);

        $this->assertInstanceOf(ExpensePostings::class, $expensePostings);
        $this->assertCount(2, $expensePostings);
    }
}
