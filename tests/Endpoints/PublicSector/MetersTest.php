<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MetersTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\PublicSector;

use Datev\API\Desktop\Endpoints\PublicSector\{MeterReadingsEndpoint, MetersEndpoint};
use Datev\Entities\PublicSector\MeterReadings\{MeterReading, MeterReadings};
use Datev\Entities\PublicSector\Meters\{Meter, Meters};
use Tests\Contracts\EndpointTest;

class MetersTest extends EndpointTest {
    protected MetersEndpoint $endpoint;
    protected MeterReadingsEndpoint $meterReadingsEndpoint;

    protected function setUp(): void {
        $this->apiDisabled = true;
        parent::setUp();
        $this->endpoint = new MetersEndpoint($this->client, self::getLogger());
        $this->meterReadingsEndpoint = new MeterReadingsEndpoint($this->client, self::getLogger());
    }

    public function test_json_serialize_meter(): void {
        $data = [
            'id' => 'METER-001',
            'meter_type' => [
                'id' => 1,
                'name' => 'Wasserzähler',
            ],
            'meter_number' => 'WZ-12345',
            'installation_date' => '2020-06-15',
            'localization' => [
                'location_description' => 'Keller',
                'building' => 'Haupthaus',
            ],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);
        $meter = Meter::fromJson($json);
        $this->assertInstanceOf(Meter::class, $meter);
        $this->assertEquals('METER-001', $meter->getID());
        $this->assertEquals('WZ-12345', $meter->getMeterNumber());
        $this->assertNotNull($meter->getMeterType());
        $this->assertEquals('Wasserzähler', $meter->getMeterType()->getName());
    }

    public function test_json_serialize_meters_collection(): void {
        $data = [
            [
                'id' => 'METER-001',
                'meter_number' => 'WZ-12345',
            ],
            [
                'id' => 'METER-002',
                'meter_number' => 'GZ-67890',
            ],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);
        $meters = Meters::fromJson($json);
        $this->assertInstanceOf(Meters::class, $meters);
        $this->assertCount(2, $meters->getValues());
    }

    public function test_json_serialize_meter_reading(): void {
        $data = [
            'id' => 'READING-001',
            'reading_date' => '2024-06-01',
            'reading_value' => 12345.67,
            'reading_reason' => 'Jahresablesung',
            'is_estimated' => false,
        ];

        $json = json_encode($data);
        $this->assertIsString($json);
        $meterReading = MeterReading::fromJson($json);
        $this->assertInstanceOf(MeterReading::class, $meterReading);
        $this->assertEquals('READING-001', $meterReading->getID());
        $this->assertEquals(12345.67, $meterReading->getReadingValue());
        $this->assertEquals('Jahresablesung', $meterReading->getReadingReason());
        $this->assertFalse($meterReading->getIsEstimated());
    }

    public function test_json_serialize_meter_readings_collection(): void {
        $data = [
            [
                'id' => 'READING-001',
                'reading_date' => '2024-06-01',
                'reading_value' => 12345.67,
            ],
            [
                'id' => 'READING-002',
                'reading_date' => '2024-12-01',
                'reading_value' => 15678.90,
            ],
        ];

        $json = json_encode($data);
        $this->assertIsString($json);
        $meterReadings = MeterReadings::fromJson($json);
        $this->assertInstanceOf(MeterReadings::class, $meterReadings);
        $this->assertCount(2, $meterReadings->getValues());
    }
}
