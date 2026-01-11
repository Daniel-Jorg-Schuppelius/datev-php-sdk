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

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\ExpenseCategories\ExpenseCategory;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategories;

class ExpenseCategoryTest extends EntityTest {
    
    public function testCreateExpenseCategory(): void {
        $data = [
            "number" => 1,
            "name" => "Reisekosten"
        ];

        $expenseCategory = new ExpenseCategory($data);

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

        $expenseCategories = new ExpenseCategories($data);

        $this->assertInstanceOf(ExpenseCategories::class, $expenseCategories);
        $this->assertCount(2, $expenseCategories);
    }
}
