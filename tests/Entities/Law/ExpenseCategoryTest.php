<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseCategoryTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\ExpenseCategories\ExpenseCategory;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategories;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ExpenseCategoryTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateExpenseCategory(): void {
        $data = [
            "number" => 1,
            "name" => "Reisekosten"
        ];

        $expenseCategory = new ExpenseCategory($data, $this->logger);

        $this->assertInstanceOf(ExpenseCategory::class, $expenseCategory);
        $this->assertEquals(1, $expenseCategory->getNumber());
        $this->assertEquals("Reisekosten", $expenseCategory->getName());
    }

    public function testCreateExpenseCategories(): void {
        $data = [
            "content" => [
                [
                    "number" => 1,
                    "name" => "Reisekosten"
                ],
                [
                    "number" => 2,
                    "name" => "Büromaterial"
                ]
            ]
        ];

        $expenseCategories = new ExpenseCategories($data, $this->logger);

        $this->assertInstanceOf(ExpenseCategories::class, $expenseCategories);
        $this->assertCount(2, $expenseCategories);
    }
}
