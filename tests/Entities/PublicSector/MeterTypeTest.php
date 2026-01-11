<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Tests\Contracts\EntityTest;

use Datev\Entities\PublicSector\Meters\MeterType;

class MeterTypeTest extends EntityTest {
    public function testCreateMeterType(): void {
        $data = [
            "id" => 1,
            "name" => "Wasserzähler Standard",
            "type" => "water",
            "mechanism" => "mechanical",
            "nominal_flow_rate" => 2.5,
            "count_of_pre_decimal_digits" => 5,
            "count_of_post_decimal_digits" => 3,
            "periodicity_of_calibration" => "6 years"
        ];

        $meterType = new MeterType($data);

        $this->assertInstanceOf(MeterType::class, $meterType);
        $this->assertEquals(1, $meterType->getID());
        $this->assertEquals("Wasserzähler Standard", $meterType->getName());
        $this->assertEquals("water", $meterType->getType());
    }
}
