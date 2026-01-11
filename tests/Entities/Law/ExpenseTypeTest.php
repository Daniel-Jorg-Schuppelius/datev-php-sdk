<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Tests\Contracts\EntityTest;

use Datev\Entities\Law\ExpenseTypes\ExpenseType;
use Datev\Entities\Law\ExpenseTypes\ExpenseTypes;

class ExpenseTypeTest extends EntityTest {
    public function testCreateExpenseType(): void {
        $data = [
            "id" => "test-id",
            "short_name" => "RK",
            "name" => "Reisekosten",
            "number" => 1,
            "visibility" => "visible",
            "hourly_billing" => false,
            "default_display" => true
        ];

        $expenseType = new ExpenseType($data);

        $this->assertInstanceOf(ExpenseType::class, $expenseType);
        $this->assertEquals("RK", $expenseType->getShortName());
        $this->assertEquals("Reisekosten", $expenseType->getName());
        $this->assertEquals(1, $expenseType->getNumber());
        $this->assertEquals("visible", $expenseType->getVisibility());
    }

    public function testCreateExpenseTypes(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "short_name" => "RK",
                    "name" => "Reisekosten"
                ],
                [
                    "id" => "test-id-2",
                    "short_name" => "BM",
                    "name" => "Büromaterial"
                ]
            ]
        ];

        $expenseTypes = new ExpenseTypes($data);

        $this->assertInstanceOf(ExpenseTypes::class, $expenseTypes);
        $this->assertCount(2, $expenseTypes);
    }
}
