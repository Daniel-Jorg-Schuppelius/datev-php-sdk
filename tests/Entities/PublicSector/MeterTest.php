<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Meters\Meter;
use Datev\Entities\PublicSector\Meters\Meters;

class MeterTest extends EntityTest {
    public function testCreateMeter() {
        $data = [
            "id" => "m1234567-8901-2345-6789-012345678901",
            "number" => "WZ-001",
            "meter_number" => "12345678",
            "installation_date" => "2020-01-15T00:00:00.000+00:00",
            "usagetype" => "water",
            "manufacturer" => "Siemens",
            "year_of_manufacture" => 2019,
            "year_of_calibration" => 2020,
            "owner" => "Stadtwerke",
            "comment" => "Hauptwasserzähler"
        ];

        $meter = new Meter($data);
        $this->assertInstanceOf(Meter::class, new Meter());
        $this->assertInstanceOf(Meter::class, $meter);
        $this->assertEquals("WZ-001", $meter->getNumber());
        $this->assertEquals("12345678", $meter->getMeterNumber());
    }

    public function testCreateMeters() {
        $data = [
            "content" => [
                [
                    "id" => "m1234567-8901-2345-6789-012345678901",
                    "number" => "WZ-001"
                ],
                [
                    "id" => "m2234567-8901-2345-6789-012345678902",
                    "number" => "WZ-002"
                ]
            ]
        ];

        $meters = new Meters($data);
        $this->assertInstanceOf(Meters::class, $meters);
        $this->assertCount(2, $meters->getValues());
    }
}
