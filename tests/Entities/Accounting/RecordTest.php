<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RecordTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\Records\Record;
use Datev\Entities\Accounting\Records\Records;

class RecordTest extends EntityTest {
    public function testCreateRecord() {
        $data = [
            "account_number" => 1200,
            "contra_account_number" => 8400,
            "amount" => 119.00,
            "debit_credit" => "S",
            "date" => "2025-01-15"
        ];        $record = new Record($data);

        $this->assertInstanceOf(Record::class, $record);
    }

    public function testCreateRecords() {
        $data = [
            "content" => [
                [
                    "account_number" => 1200,
                    "contra_account_number" => 8400,
                    "amount" => 119.00,
                    "debit_credit" => "S"
                ],
                [
                    "account_number" => 1400,
                    "contra_account_number" => 8401,
                    "amount" => 238.00,
                    "debit_credit" => "H"
                ]
            ]
        ];        $records = new Records($data);

        $this->assertInstanceOf(Records::class, $records);
        $this->assertCount(2, $records->getValues());
    }
}
