<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdvancePaymentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\AdvancePayments\AdvancePayment;
use Datev\Entities\Accounting\AdvancePayments\AdvancePayments;

class AdvancePaymentTest extends EntityTest {
    
    public function testCreateAdvancePayment(): void {
        $data = [
            "eu_member_state" => "DE",
            "eu_tax_rate" => 19.0,
            "order_number" => "2024-001",
            "revenue_account" => 8400,
            "tax_key" => 3
        ];

        $advancePayment = new AdvancePayment($data);

        $this->assertInstanceOf(AdvancePayment::class, $advancePayment);
    }

    public function testCreateAdvancePayments(): void {
        $data = [
            "content" => [
                [
                    "order_number" => "2024-001",
                    "revenue_account" => 8400
                ],
                [
                    "order_number" => "2024-002",
                    "revenue_account" => 8500
                ]
            ]
        ];

        $advancePayments = new AdvancePayments($data);

        $this->assertInstanceOf(AdvancePayments::class, $advancePayments);
        $this->assertCount(2, $advancePayments);
    }
}
