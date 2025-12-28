<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterReadingTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\PublicSector\MeterReadings\MeterReading;
use Datev\Entities\PublicSector\MeterReadings\MeterReadings;
use PHPUnit\Framework\TestCase;

class MeterReadingTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateMeterReading() {
        $data = [
            "id" => "r1234567-8901-2345-6789-012345678901",
            "date" => "2024-03-15T00:00:00.000+00:00",
            "reading_date" => "2024-03-15T10:30:00.000+00:00",
            "value" => 1250.5,
            "reading_value" => 1250.5,
            "reading_reason" => "regular",
            "is_estimated" => false,
            "consumption" => 150.0,
            "reader" => "Müller",
            "comment" => "Regelablesung"
        ];

        $meterReading = new MeterReading($data, $this->logger);
        $this->assertInstanceOf(MeterReading::class, new MeterReading());
        $this->assertInstanceOf(MeterReading::class, $meterReading);
        $this->assertEquals(1250.5, $meterReading->getValue());
    }

    public function testCreateMeterReadings() {
        $data = [
            "content" => [
                [
                    "id" => "r1234567-8901-2345-6789-012345678901"
                ],
                [
                    "id" => "r2234567-8901-2345-6789-012345678902"
                ]
            ]
        ];

        $meterReadings = new MeterReadings($data, $this->logger);
        $this->assertInstanceOf(MeterReadings::class, $meterReadings);
        $this->assertCount(2, $meterReadings->getValues());
    }
}
