<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualDatumRecordTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\Data\Individual\IndividualDatumRecord;

class IndividualDatumRecordTest extends EntityTest {
    public function testCreateIndividualDatumRecord(): void {
        $data = [
            "long_field_name" => "Sonderzahlung Weihnachtsgeld",
            "short_field_name" => "SZW",
            "date" => "2024-12-15T00:00:00.000+00:00",
            "amount" => 1500.00
        ];

        $record = new IndividualDatumRecord($data);

        $this->assertInstanceOf(IndividualDatumRecord::class, $record);
        $this->assertEquals("Sonderzahlung Weihnachtsgeld", $record->getLongFieldName());
        $this->assertEquals("SZW", $record->getShortFieldName());
        $this->assertEquals(1500.00, $record->getAmount());
    }
}
