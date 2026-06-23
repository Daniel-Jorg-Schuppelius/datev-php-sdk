<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TermsOfPaymentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\TermsOfPayment\{TermOfPayment, TermsOfPayment};
use Tests\Contracts\EntityTest;

class TermsOfPaymentTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "caption" => "30 Tage netto",
                    "net_days" => 30,
                    "discount_percentage_1" => 2,
                    "discount_days_1" => 10,
                ],
                [
                    "id" => 2,
                    "caption" => "14 Tage 2% Skonto",
                    "net_days" => 14,
                    "discount_percentage_1" => 2,
                    "discount_days_1" => 7,
                ],
            ],
        ];

        $terms = new TermsOfPayment($data);

        $this->assertCount(2, $terms->getValues());
        $this->assertInstanceOf(TermOfPayment::class, $terms->getValues()[0]);
    }
}
