<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BillingCategoryTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\BillingCategories\{BillingCategories, BillingCategory};
use Tests\Contracts\EntityTest;

class BillingCategoryTest extends EntityTest {
    public function test_create_billing_category(): void {
        $data = [
            "number" => 1,
            "name" => "Standard-Abrechnung",
        ];

        $billingCategory = new BillingCategory($data);

        $this->assertInstanceOf(BillingCategory::class, $billingCategory);
        $this->assertEquals(1, $billingCategory->getNumber());
        $this->assertEquals("Standard-Abrechnung", $billingCategory->getName());
    }

    public function test_create_billing_categories(): void {
        $data = [
            "content" => [
                [
                    "number" => 1,
                    "name" => "Standard-Abrechnung",
                ],
                [
                    "number" => 2,
                    "name" => "Zusatzleistungen",
                ],
            ],
        ];

        $billingCategories = new BillingCategories($data);

        $this->assertInstanceOf(BillingCategories::class, $billingCategories);
        $this->assertCount(2, $billingCategories);
    }
}
