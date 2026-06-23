<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\Creditors\{Creditor, Creditors};
use Tests\Contracts\EntityTest;

class CreditorsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "id" => "cred-1",
                    "caption" => "Lieferant A",
                    "account_number" => 70001,
                ],
                [
                    "id" => "cred-2",
                    "caption" => "Lieferant B",
                    "account_number" => 70002,
                ],
            ],
        ];

        $creditors = new Creditors($data);

        $this->assertCount(2, $creditors->getValues());
        $this->assertInstanceOf(Creditor::class, $creditors->getValues()[0]);
    }
}
