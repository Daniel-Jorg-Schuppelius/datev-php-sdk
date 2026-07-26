<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BudgetTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\Budgets\Budget;
use Tests\Contracts\EntityTest;

class BudgetTest extends EntityTest {
    public function test_create_budget(): void {
        $data = [
            "id" => 1,
            "budget" => 1000.00,
            "sum_time_expenses" => 200.00,
            "sum_taxable_expenses" => 329.00,
            "unused_budget" => 471.00,
            "currency_unit" => "EUR",
        ];

        $budget = new Budget($data);
        $this->assertInstanceOf(Budget::class, new Budget);
        $this->assertInstanceOf(Budget::class, $budget);
        $this->assertEquals(1, $budget->getID());
        $this->assertEquals(1000.00, $budget->getBudget());
        $this->assertEquals(200.00, $budget->getSumTimeExpenses());
        $this->assertEquals(329.00, $budget->getSumTaxableExpenses());
        $this->assertEquals(471.00, $budget->getUnusedBudget());
        $this->assertEquals("EUR", $budget->getCurrencyUnit());
    }

    public function test_create_empty_budget(): void {
        $budget = new Budget(null);
        $this->assertInstanceOf(Budget::class, $budget);
        $this->assertNull($budget->getID());
        $this->assertNull($budget->getBudget());
    }
}
