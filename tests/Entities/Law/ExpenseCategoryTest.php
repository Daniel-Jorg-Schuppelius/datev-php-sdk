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

use Datev\Entities\Law\ExpenseCategories\{ExpenseCategories, ExpenseCategory};
use Tests\Contracts\EntityTest;

class ExpenseCategoryTest extends EntityTest {
    public function test_create_expense_category(): void {
        $data = [
            "number" => 1,
            "name" => "Reisekosten",
        ];

        $expenseCategory = new ExpenseCategory($data);

        $this->assertInstanceOf(ExpenseCategory::class, $expenseCategory);
        $this->assertEquals(1, $expenseCategory->getNumber());
        $this->assertEquals("Reisekosten", $expenseCategory->getName());
    }

    public function test_create_expense_categories(): void {
        $data = [
            "content" => [
                [
                    "number" => 1,
                    "name" => "Reisekosten",
                ],
                [
                    "number" => 2,
                    "name" => "Büromaterial",
                ],
            ],
        ];

        $expenseCategories = new ExpenseCategories($data);

        $this->assertInstanceOf(ExpenseCategories::class, $expenseCategories);
        $this->assertCount(2, $expenseCategories);
    }
}
