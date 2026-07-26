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

use Datev\Entities\PublicSector\TransactionMeterReadings\{TransactionMeterReading, TransactionMeterReadings};
use Tests\Contracts\EntityTest;

class TransactionMeterReadingTest extends EntityTest {
    public function test_create_transaction_meter_reading(): void {
        $data = [
            "id" => 12345,
            "status" => "confirmed",
        ];

        $reading = new TransactionMeterReading($data);
        $this->assertInstanceOf(TransactionMeterReading::class, new TransactionMeterReading);
        $this->assertInstanceOf(TransactionMeterReading::class, $reading);
        $this->assertEquals(12345, $reading->getID());
        $this->assertEquals("confirmed", $reading->getStatus());
    }

    public function test_create_transaction_meter_readings(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "status" => "confirmed",
                ],
                [
                    "id" => 2,
                    "status" => "pending",
                ],
            ],
        ];

        $readings = new TransactionMeterReadings($data);
        $this->assertInstanceOf(TransactionMeterReadings::class, $readings);
        $this->assertCount(2, $readings->getValues());
    }
}
