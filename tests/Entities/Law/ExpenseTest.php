<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Law\Expenses\Expense;
use Datev\Entities\Law\Expenses\Expenses;
use PHPUnit\Framework\TestCase;

class ExpenseTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateExpense() {
        $data = [
            "id" => "exp-12345",
            "object_type" => "travel",
            "unit_value" => 150.50,
            "amount" => 150.50,
            "currency" => "EUR",
            "billable" => true,
            "note" => "Fahrtkosten Gerichtstermin"
        ];

        $expense = new Expense($data, $this->logger);
        $this->assertInstanceOf(Expense::class, new Expense());
        $this->assertInstanceOf(Expense::class, $expense);
        $this->assertNotNull($expense->getID());
    }

    public function testCreateExpenses() {
        $data = [
            "content" => [
                [
                    "id" => "exp-12345",
                    "amount" => 100.00
                ],
                [
                    "id" => "exp-12346",
                    "amount" => 200.00
                ]
            ]
        ];

        $expenses = new Expenses($data, $this->logger);
        $this->assertInstanceOf(Expenses::class, $expenses);
        $this->assertCount(2, $expenses->getValues());
    }
}
