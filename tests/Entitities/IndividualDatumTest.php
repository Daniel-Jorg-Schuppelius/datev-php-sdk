<?php

declare(strict_types=1);

namespace Tests\Entities;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\Payroll\Data\Individual\IndividualData;
use Datev\Entities\Payroll\Data\Individual\IndividualDatum;
use PHPUnit\Framework\TestCase;

class IndividualDatumTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateIndividualDatum() {
        $data = [
            'id' => '00001',
            'long_field_name' => 'Firmenwagen',
            'short_field_name' => 'KFZ',
            'date' => '2019-01-01',
            'amount' => '149.98',
            'long_field_name2' => 'Firmenwagen',
            'short_field_name2' => 'KFZ',
            'date2' => '2019-01-01',
            'amount2' => '149.98',
            'long_field_name3' => 'Firmenwagen',
            'short_field_name3' => 'KFZ',
            'date3' => '2019-01-01',
            'amount3' => '149.98',
            'long_field_name4' => 'Firmenwagen',
            'short_field_name4' => 'KFZ',
            'date4' => '2019-01-01',
            'amount4' => '149.98',
            'long_field_name5' => 'Firmenwagen',
            'short_field_name5' => 'KFZ',
            'date5' => '2019-01-01',
            'amount5' => '149.98',
            'long_field_name6' => 'Firmenwagen',
            'short_field_name6' => 'KFZ',
            'date6' => '2019-01-01',
            'amount6' => '149.98',
            'long_field_name7' => 'Firmenwagen',
            'short_field_name7' => 'KFZ',
            'date7' => '2019-01-01',
            'amount7' => '149.98',
            'long_field_name8' => 'Firmenwagen',
            'short_field_name8' => 'KFZ',
            'date8' => '2019-01-01',
            'amount8' => '149.98'
        ];

        $individualDatum = new IndividualDatum($data, $this->logger);
        $this->assertTrue($individualDatum->isValid());
        $this->assertInstanceOf(IndividualDatum::class, new IndividualDatum());
        $this->assertInstanceOf(IndividualDatum::class, $individualDatum);
        $this->assertEquals($data, $individualDatum->toArray());
        $this->assertEquals('00001', $individualDatum->getID()->getValue());
    }

    public function testCreateIndividualData() {
        $json = '[{"id":"00001","long_field_name":"Firmenwagen","short_field_name":"KFZ","date":"2019-01-01","amount":149.98,"long_field_name2":"Firmenwagen","short_field_name2":"KFZ","date2":"2019-01-01","amount2":149.98,"long_field_name3":"Firmenwagen","short_field_name3":"KFZ","date3":"2019-01-01","amount3":149.98,"long_field_name4":"Firmenwagen","short_field_name4":"KFZ","date4":"2019-01-01","amount4":149.98,"long_field_name5":"Firmenwagen","short_field_name5":"KFZ","date5":"2019-01-01","amount5":149.98,"long_field_name6":"Firmenwagen","short_field_name6":"KFZ","date6":"2019-01-01","amount6":149.98,"long_field_name7":"Firmenwagen","short_field_name7":"KFZ","date7":"2019-01-01","amount7":149.98,"long_field_name8":"Firmenwagen","short_field_name8":"KFZ","date8":"2019-01-01","amount8":149.98}]';

        $individualData = IndividualData::fromJson($json);

        $this->assertEquals($json, $individualData->toJSON());
    }
}