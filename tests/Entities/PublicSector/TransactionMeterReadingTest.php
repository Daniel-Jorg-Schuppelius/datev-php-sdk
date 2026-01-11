<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionMeterReadingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReading;
use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReadings;

class TransactionMeterReadingTest extends EntityTest {
    public function testCreateTransactionMeterReading() {
        $data = [
            "id" => 12345,
            "status" => "confirmed"
        ];

        $reading = new TransactionMeterReading($data);
        $this->assertInstanceOf(TransactionMeterReading::class, new TransactionMeterReading());
        $this->assertInstanceOf(TransactionMeterReading::class, $reading);
        $this->assertEquals(12345, $reading->getID());
        $this->assertEquals("confirmed", $reading->getStatus());
    }

    public function testCreateTransactionMeterReadings() {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "confirmed"
                ],
                [
                    "id" => 2,
                    "status" => "pending"
                ]
            ]
        ];

        $readings = new TransactionMeterReadings($data);
        $this->assertInstanceOf(TransactionMeterReadings::class, $readings);
        $this->assertCount(2, $readings->getValues());
    }
}
