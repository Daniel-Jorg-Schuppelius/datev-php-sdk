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

use Datev\API\Desktop\Endpoints\PublicSector\MetersEndpoint;
use Datev\API\Desktop\Endpoints\PublicSector\MeterReadingsEndpoint;
use Datev\Entities\PublicSector\Meters\Meter;
use Datev\Entities\PublicSector\Meters\Meters;
use Datev\Entities\PublicSector\MeterReadings\MeterReading;
use Datev\Entities\PublicSector\MeterReadings\MeterReadings;
use Tests\Contracts\EndpointTest;

class MetersTest extends EndpointTest {
    protected ?MetersEndpoint $endpoint;
    protected ?MeterReadingsEndpoint $meterReadingsEndpoint;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->endpoint = new MetersEndpoint($this->client, $this->logger);
        $this->meterReadingsEndpoint = new MeterReadingsEndpoint($this->client, $this->logger);
        $this->apiDisabled = true;
    }

    public function testJsonSerializeMeter() {
        $data = [
            'id' => 'METER-001',
            'meter_type' => [
                'id' => 1,
                'name' => 'Wasserzähler'
            ],
            'meter_number' => 'WZ-12345',
            'installation_date' => '2020-06-15',
            'localization' => [
                'location_description' => 'Keller',
                'building' => 'Haupthaus'
            ]
        ];

        $meter = Meter::fromJson(json_encode($data));
        $this->assertInstanceOf(Meter::class, $meter);
        $this->assertEquals('METER-001', $meter->getId());
        $this->assertEquals('WZ-12345', $meter->getMeterNumber());
        $this->assertNotNull($meter->getMeterType());
        $this->assertEquals('Wasserzähler', $meter->getMeterType()->getName());
    }

    public function testJsonSerializeMetersCollection() {
        $data = [
            [
                'id' => 'METER-001',
                'meter_number' => 'WZ-12345'
            ],
            [
                'id' => 'METER-002',
                'meter_number' => 'GZ-67890'
            ]
        ];

        $meters = Meters::fromJson(json_encode($data));
        $this->assertInstanceOf(Meters::class, $meters);
        $this->assertCount(2, $meters->getValues());
    }

    public function testJsonSerializeMeterReading() {
        $data = [
            'id' => 'READING-001',
            'reading_date' => '2024-06-01',
            'reading_value' => 12345.67,
            'reading_reason' => 'Jahresablesung',
            'is_estimated' => false
        ];

        $meterReading = MeterReading::fromJson(json_encode($data));
        $this->assertInstanceOf(MeterReading::class, $meterReading);
        $this->assertEquals('READING-001', $meterReading->getId());
        $this->assertEquals(12345.67, $meterReading->getReadingValue());
        $this->assertEquals('Jahresablesung', $meterReading->getReadingReason());
        $this->assertFalse($meterReading->getIsEstimated());
    }

    public function testJsonSerializeMeterReadingsCollection() {
        $data = [
            [
                'id' => 'READING-001',
                'reading_date' => '2024-06-01',
                'reading_value' => 12345.67
            ],
            [
                'id' => 'READING-002',
                'reading_date' => '2024-12-01',
                'reading_value' => 15678.90
            ]
        ];

        $meterReadings = MeterReadings::fromJson(json_encode($data));
        $this->assertInstanceOf(MeterReadings::class, $meterReadings);
        $this->assertCount(2, $meterReadings->getValues());
    }
}
