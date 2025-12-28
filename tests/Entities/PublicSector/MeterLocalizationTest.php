<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterLocalizationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\Meters\MeterLocalization;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class MeterLocalizationTest extends TestCase {
    public function testCreateMeterLocalization(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "is_located" => "yes",
            "location_description" => "Keller, linke Seite",
            "building" => "Hauptgebäude",
            "last_replacement_date" => "2020-06-15T00:00:00.000+00:00",
            "last_replacement_reason" => "Eichfrist abgelaufen",
            "comment" => "Schwer zugänglich",
            "meter_purpose" => "Hauptzähler",
            "reading_district" => "Bezirk Nord"
        ];

        $localization = new MeterLocalization($data, $logger);

        $this->assertInstanceOf(MeterLocalization::class, $localization);
        $this->assertEquals("yes", $localization->getIsLocated());
        $this->assertEquals("Keller, linke Seite", $localization->getLocationDescription());
        $this->assertEquals("Hauptgebäude", $localization->getBuilding());
        $this->assertEquals("Hauptzähler", $localization->getMeterPurpose());
    }
}
