<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPaymentsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Datev\Entities\Payroll\GrossPayments\{GrossPayment, GrossPayments};
use Tests\Contracts\EntityTest;

class GrossPaymentsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "1",
                    "personnel_number" => "00001",
                    "amount" => 3500.00,
                    "payment_interval" => "monatlich",
                ],
                [
                    "id" => "2",
                    "personnel_number" => "00002",
                    "amount" => 4000.00,
                    "payment_interval" => "monatlich",
                ],
            ],
        ];

        $grossPayments = new GrossPayments($data);

        $this->assertCount(2, $grossPayments->getValues());
        $this->assertInstanceOf(GrossPayment::class, $grossPayments->getValues()[0]);
    }
}
