<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionMeterReadingDataTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReadingData;

class TransactionMeterReadingDataTest extends EntityTest {
    public function testCreateTransactionMeterReadingData(): void {
        $data = [
            "meter_id" => "MTR-001",
            "identification_number" => "12345678",
            "date" => "2024-01-15T10:30:00.000+00:00",
            "value" => 1234.567,
            "relevance" => "billing",
            "sign" => "positive",
            "reason" => "regular",
            "overrun" => false,
            "reverse_running" => false,
            "initialised" => true,
            "reader" => "Automatisch",
            "comment_for_notification" => "Turnusmäßige Ablesung",
            "comment" => "Keine Auffälligkeiten"
        ];

        $meterReading = new TransactionMeterReadingData($data);

        $this->assertInstanceOf(TransactionMeterReadingData::class, $meterReading);
        $this->assertEquals("MTR-001", $meterReading->getMeterId());
        $this->assertEquals("12345678", $meterReading->getIDentificationNumber());
        $this->assertEquals(1234.567, $meterReading->getValue());
        $this->assertEquals("billing", $meterReading->getRelevance());
        $this->assertFalse($meterReading->getOverrun());
        $this->assertTrue($meterReading->getInitialised());
    }
}
