<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TermOfPaymentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\TermsOfPayment\TermOfPayment;
use Datev\Entities\Accounting\TermsOfPayment\TermsOfPayment;

class TermOfPaymentTest extends EntityTest {
    public function testCreateTermOfPayment() {
        $data = [
            "id" => 1,
            "caption" => "14 Tage 2% Skonto, 30 Tage netto",
            "discount_percentage_1" => 2,
            "discount_percentage_2" => 0,
            "discount_days_1" => 14,
            "discount_days_2" => 0,
            "net_days" => 30,
            "payment_type" => "standard",
            "is_locked" => false
        ];

        $term = new TermOfPayment($data);
        $this->assertInstanceOf(TermOfPayment::class, new TermOfPayment());
        $this->assertInstanceOf(TermOfPayment::class, $term);
        $this->assertEquals("14 Tage 2% Skonto, 30 Tage netto", $term->getCaption());
        $this->assertEquals(2, $term->getDiscountPercentage1());
        $this->assertEquals(14, $term->getDiscountDays1());
        $this->assertEquals(30, $term->getNetDays());
        $this->assertFalse($term->isLocked());
    }

    public function testCreateTermsOfPayment() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "caption" => "Sofort netto",
                    "net_days" => 0
                ],
                [
                    "id" => 2,
                    "caption" => "30 Tage netto",
                    "net_days" => 30
                ]
            ]
        ];

        $terms = new TermsOfPayment($data);
        $this->assertInstanceOf(TermsOfPayment::class, $terms);
        $this->assertCount(2, $terms->getValues());
    }
}
