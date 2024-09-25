<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\DocumentManagement\Domains\Domain;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateDocument() {
        $data = [
            "correspondence_partner" => [
                "domain" => "Mandant",
                "link" => "http://localhost:58454/datev/api/master-data/v1/clients"
            ],
            "folder" => [
                [
                    "name" => "Stammakte",
                    "registers" => [
                        [
                            "name" => "Korrespondenz",
                            "id" => "2"
                        ]
                    ],
                    "id" => "3"
                ]
            ],
            "is_selected" => "true",
            "name" => "Mandant",
            "id" => "1"
        ];

        $domain = new Domain($data, $this->logger);
        $this->assertTrue($domain->isValid());
        $this->assertInstanceOf(Domain::class, new Domain());
        $this->assertInstanceOf(Domain::class, $domain);
        // $this->assertEquals($data, $document->toArray());
        $this->assertEquals('1', $domain->getID()->getValue());
    }

    // public function testCreateIndividualData() {
    //     $json = '[{"id":"00001","long_field_name":"Firmenwagen","short_field_name":"KFZ","date":"2019-01-01","amount":149.98,"long_field_name2":"Firmenwagen","short_field_name2":"KFZ","date2":"2019-01-01","amount2":149.98,"long_field_name3":"Firmenwagen","short_field_name3":"KFZ","date3":"2019-01-01","amount3":149.98,"long_field_name4":"Firmenwagen","short_field_name4":"KFZ","date4":"2019-01-01","amount4":149.98,"long_field_name5":"Firmenwagen","short_field_name5":"KFZ","date5":"2019-01-01","amount5":149.98,"long_field_name6":"Firmenwagen","short_field_name6":"KFZ","date6":"2019-01-01","amount6":149.98,"long_field_name7":"Firmenwagen","short_field_name7":"KFZ","date7":"2019-01-01","amount7":149.98,"long_field_name8":"Firmenwagen","short_field_name8":"KFZ","date8":"2019-01-01","amount8":149.98}]';

    //     $individualData = IndividualData::fromJson($json);

    //     $this->assertEquals($json, $individualData->toJSON());
    // }
}
