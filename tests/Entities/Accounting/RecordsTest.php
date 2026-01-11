<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RecordsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Records\Records;
use Datev\Entities\Accounting\Records\Record;

class RecordsTest extends EntityTest {
    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "account_number" => 1200,
                    "contra_account_number" => 4400,
                    "amount" => 1000.00,
                    "date" => "2024-01-15"
                ],
                [
                    "account_number" => 1200,
                    "contra_account_number" => 4400,
                    "amount" => 2500.00,
                    "date" => "2024-01-20"
                ]
            ]
        ];

        $records = new Records($data);

        $this->assertCount(2, $records->getValues());
        $this->assertInstanceOf(Record::class, $records->getValues()[0]);
    }
}
