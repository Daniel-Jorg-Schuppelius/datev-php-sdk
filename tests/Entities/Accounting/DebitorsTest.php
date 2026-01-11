<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Debitors\Debitors;
use Datev\Entities\Accounting\Debitors\Debitor;

class DebitorsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "deb-1",
                    "caption" => "Kunde A",
                    "account_number" => 10001
                ],
                [
                    "id" => "deb-2",
                    "caption" => "Kunde B",
                    "account_number" => 10002
                ]
            ]
        ];

        $debitors = new Debitors($data);

        $this->assertCount(2, $debitors->getValues());
        $this->assertInstanceOf(Debitor::class, $debitors->getValues()[0]);
    }
}
