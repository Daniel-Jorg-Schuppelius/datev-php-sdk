<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RecordReadTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Tests\Contracts\EntityTest;

use Datev\Entities\Accounting\RecordReads\RecordRead;
use Datev\Entities\Accounting\RecordReads\RecordReads;

class RecordReadTest extends EntityTest {
    public function testCreateRecordRead() {
        $data = [
            "id" => 1,
            "account_number" => 1800,
            "contra_account_number" => 4400,
            "amount" => 1500.50,
            "date" => "2024-01-15T00:00:00.000+00:00",
            "posting_description" => "Umsatzerlöse"
        ];

        $recordRead = new RecordRead($data);
        $this->assertInstanceOf(RecordRead::class, new RecordRead());
        $this->assertInstanceOf(RecordRead::class, $recordRead);
    }

    public function testCreateRecordReads() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "account_number" => 1800,
                    "amount" => 1000.00
                ],
                [
                    "id" => 2,
                    "account_number" => 4400,
                    "amount" => 2000.00
                ]
            ]
        ];

        $recordReads = new RecordReads($data);
        $this->assertInstanceOf(RecordReads::class, $recordReads);
        $this->assertCount(2, $recordReads->getValues());
    }
}
