<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPaymentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\GrossPayments\{GrossPayment, GrossPaymentID, GrossPayments};
use Tests\Contracts\EntityTest;

class GrossPaymentTest extends EntityTest {
    public function test_create_gross_payment(): void {
        $data = [
            "id" => "gp-001",
            "personnel_number" => "12345",
            "amount" => 5000.00,
            "payment_interval" => "monthly",
        ];

        $grossPayment = new GrossPayment($data);

        $this->assertInstanceOf(GrossPayment::class, $grossPayment);
        $this->assertInstanceOf(GrossPaymentID::class, $grossPayment->getID());
        $this->assertEquals("gp-001", $grossPayment->getID()->getValue());
        $this->assertEquals("12345", $grossPayment->getPersonnelNumber());
        $this->assertSame('5000.00', $grossPayment->getAmount()?->getAmount());
    }

    public function test_create_gross_payments(): void {
        $data = [
            "content" => [
                [
                    "id" => "gp-001",
                    "personnel_number" => "12345",
                    "amount" => 5000.00,
                ],
                [
                    "id" => "gp-002",
                    "personnel_number" => "67890",
                    "amount" => 4500.00,
                ],
            ],
        ];

        $grossPayments = new GrossPayments($data);

        $this->assertInstanceOf(GrossPayments::class, $grossPayments);
        $this->assertCount(2, $grossPayments);
        $this->assertInstanceOf(GrossPayment::class, $grossPayments->getValues()[0]);
    }
}
